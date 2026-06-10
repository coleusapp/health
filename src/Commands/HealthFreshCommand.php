<?php

namespace Coleus\Health\Commands;

use Coleus\Health\Models\Category;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Health\Models\OralCare;
use Coleus\Health\Models\Toothpaste;
use Coleus\Health\Models\Weight;
use Coleus\Health\Models\Workout;
use Coleus\Users\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Throwable;

class HealthFreshCommand extends Command
{
    protected $signature = 'health:fresh
                            {--seed : Seed the database with sample data after migrating}
                            {--user= : User ID or email to use for seeded records (defaults to first user)}
                            {--force : Skip the confirmation prompt}';

    protected $description = 'Drop all Health tables, clear migration records, and re-run migrations (dev only)';

    public function handle(): int
    {
        // if (app()->isProduction()) {
        //     $this->error('This command cannot be run in production.');
        //
        //     return self::FAILURE;
        // }
        //
        // if (! $this->option('force') && ! $this->confirm('This will DROP all health_ tables. Continue? (dev only)')) {
        //     return self::FAILURE;
        // }

        $this->dropHealthTables();
        $this->clearMigrationRecords();
        $this->deletePublishedMigrations();
        $this->publishMigrations();
        $this->runMigrations();

        if ($this->option('seed')) {
            $user = $this->resolveUser();

            if (! $user) {
                $this->error('No user found. Pass --user=<id|email> or ensure at least one user exists.');

                return self::FAILURE;
            }

            $this->seed($user);
        }

        $this->newLine();
        $this->info('Health database refreshed successfully.');

        return self::SUCCESS;
    }

    private function dropHealthTables(): void
    {
        $prefix = config('health.table_prefix', 'health_');

        Schema::disableForeignKeyConstraints();

        $count = collect(Schema::getTables())
            ->filter(fn (array $table) => str_starts_with($table['name'], $prefix))
            ->unique('name')
            ->each(function (array $table) {
                try {
                    Schema::drop($table['name']);
                    $this->line("  <fg=red>dropped</> {$table['name']}");
                } catch (Throwable $e) {
                    $this->warn("  skipped {$table['name']}");
                }
            })
            ->count();

        Schema::enableForeignKeyConstraints();

        $this->info("Dropped {$count} health table(s).");
    }

    private function clearMigrationRecords(): void
    {
        $names = collect(glob(database_path('migrations/health/*.php')))
            ->map(fn (string $path) => pathinfo($path, PATHINFO_FILENAME));

        if ($names->isEmpty()) {
            return;
        }

        $deleted = DB::table('migrations')
            ->whereIn('migration', $names)
            ->delete();

        $this->info("Cleared {$deleted} migration record(s).");
    }

    private function deletePublishedMigrations(): void
    {
        $path = database_path('migrations/health');

        if (! is_dir($path)) {
            return;
        }

        app('files')->deleteDirectory($path);
        $this->info("Deleted {$path}.");
    }

    private function publishMigrations(): void
    {
        $this->info('Publishing migrations...');
        Artisan::call('vendor:publish', ['--tag' => 'health-migrations', '--force' => true], $this->output);
    }

    private function runMigrations(): void
    {
        $this->info('Running migrations...');
        Artisan::call('migrate', ['--path' => 'database/migrations/health'], $this->output);
    }

    private function seed(User $user): void
    {
        $this->info('Seeding health data...');

        Auth::login($user);

        // Muscle groups — no user ownership
        MuscleGroup::factory(8)->withoutParent()->create();
        MuscleGroup::factory(12)->withParent()->create();
        $allGroups = MuscleGroup::all();

        // Toothpastes — no user ownership
        $toothpastes = Toothpaste::factory(6)->create();

        // Categories
        $categories = Category::factory(8)->create();

        // Exercises linked to muscle groups and categories
        $exercises = Exercise::factory(25)->allTrue()->create();

        $exercises->each(function (Exercise $exercise) use ($allGroups) {
            $exercise->muscleGroups()->attach($allGroups->random(rand(1, 3))->pluck('id'));
        });

        $categories->each(function (Category $category) use ($exercises) {
            $category->exercises()->attach($exercises->random(rand(4, 10))->pluck('id'));
        });

        // Weight log — 90 days of daily entries
        Weight::factory(90)->create();

        // Oral care — 90 days of entries with toothpaste associations
        OralCare::factory(90)->create()->each(function (OralCare $oralCare) use ($toothpastes) {
            $oralCare->toothpastes()->attach($toothpastes->random(rand(1, 2))->pluck('id'));
        });

        // Workouts with exercise pivot data
        Workout::factory(30)->create()->each(function (Workout $workout) use ($exercises) {
            $pivotData = $exercises->random(rand(3, 6))->mapWithKeys(fn (Exercise $e) => [
                $e->id => [
                    'reps' => fake()->numberBetween(6, 15),
                    'weight' => fake()->randomFloat(1, 20, 120),
                    'weight_unit' => 'kg',
                    'distance' => null,
                    'distance_unit' => null,
                    'duration' => null,
                    'duration_unit' => null,
                    'calorie' => null,
                    'calorie_unit' => null,
                ],
            ]);

            $workout->exercises()->attach($pivotData->all());
        });

        $this->info('Seeding complete.');
    }

    private function resolveUser(): ?User
    {
        $input = $this->option('user');

        if (! $input) {
            return User::first();
        }

        return is_numeric($input)
            ? User::find($input)
            : User::where('email', $input)->first();
    }
}
