# Health

A Laravel package for tracking personal health data. Part of the Coleus monorepo.

## Domains

- **Fitness** — exercise categories, muscle groups, exercises, and workouts (reps/sets/weight/distance/duration/calories per exercise)
- **Body weight** — weight log entries with configurable unit (kg / lbs)
- **Oral care** — daily dental hygiene log (brushed, flossed, fluoride, duration, toothpastes used)

## Models

`Category`, `Exercise`, `MuscleGroup`, `Workout`, `Weight`, `OralCare`, `Toothpaste`

## Configuration

Publish and edit `config/health.php`:

```php
'table_prefix'    => 'health_',   // prefix for all package tables
'route_prefix'    => 'health',    // URL and named-route prefix
'settings_prefix' => 'health',    // Spatie Settings group prefix
```

## Settings

User-level preferences are stored via [Spatie Laravel Settings](https://github.com/spatie/laravel-settings) in `GeneralSettings`: `timezone`, `weight_unit`, `distance_unit`, `duration_unit`, `calorie_unit`.

## Frontend

Inertia + Vue 3 pages are served under the `health` route prefix. Pages live in `resources/js/pages/`.

## Database / Migrations

Migration stubs live in `packages/health/database/migrations/health/` and are registered in `HealthServiceProvider` via `hasMigrations([...])` + `runsMigrations()`.

### Auto-run on boot

Because `runsMigrations()` is set, the package's migrations run automatically when the app boots. Manual publishing is optional.

### Publishing migrations

To copy the stubs into your app's `database/migrations/` directory (e.g. to customise them):

```bash
php artisan vendor:publish --tag=health-migrations
```

### Running migrations

```bash
php artisan migrate
```

### Dev reset

Use the dedicated `health:fresh` command to drop all `health_*` tables, clear their migration records, and re-run migrations in one step:

```bash
# Reset only
php artisan health:fresh

# Reset + seed sample data (90 days weight, oral care, 30 workouts, 25 exercises, etc.)
php artisan health:fresh --seed

# Seed as a specific user
php artisan health:fresh --seed --user=1
php artisan health:fresh --seed --user=admin@example.com

# Skip the confirmation prompt
php artisan health:fresh --force --seed
```

The command:
1. Drops all tables prefixed with `health_`
2. Deletes their records from the `migrations` table
3. Re-runs `php artisan migrate` (health migrations auto-load via `runsMigrations()`)
4. Optionally seeds realistic sample data via factories (`--seed`)

## How to use

### Using the facade

```php
use Coleus\Health\Facades\Health;

Health::category()->index();
Health::category()->store($data);
Health::category()->update($category, $data);
Health::category()->destroy($category);

Health::muscleGroup()->index();
Health::muscleGroup()->store($data);
Health::muscleGroup()->update($muscleGroup, $data);
Health::muscleGroup()->destroy($muscleGroup);

Health::exercise()->index();
Health::exercise()->store($data, $categories, $muscleGroups);
Health::exercise()->update($exercise, $data, $categories, $muscleGroups);
Health::exercise()->destroy($exercise);

Health::weight()->index();
Health::weight()->store($data);
Health::weight()->update($weight, $data);
Health::weight()->destroy($weight);
```
