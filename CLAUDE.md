# Health Package

## Overview
Laravel package for tracking fitness, body weight, oral care, and exercise data.

- **Namespace:** `Coleus\Health`
- **Config:** `config/health.php` — table prefix (`health_`), route prefix (`health`), settings prefix (`health`)
- **ServiceProvider:** `HealthServiceProvider` — registers migrations, routes, assets, views, and Inertia middleware
- **Facade:** `Coleus\Health\Facades\Health`

## Table Prefix
All tables are prefixed with `health_` (configurable). Always resolve via `config('health.table_prefix')` or through the model's `getTable()`.

## Migrations
Stubs live in `database/migrations/health/` and are registered in `HealthServiceProvider`. Never place them in the root `database/migrations/`.

| Stub | Table | Has Model | Has Factory |
|------|-------|-----------|-------------|
| `create_categories_table` | `health_categories` | `Category` | `CategoryFactory` |
| `create_exercises_table` | `health_exercises` | `Exercise` | `ExerciseFactory` |
| `create_muscle_groups_table` | `health_muscle_groups` | `MuscleGroup` | `MuscleGroupFactory` |
| `create_workouts_table` | `health_workouts` | `Workout` | `WorkoutFactory` |
| `create_weights_table` | `health_weights` | `Weight` | `WeightFactory` |
| `create_oral_cares_table` | `health_oral_cares` | `OralCare` | `OralCareFactory` |
| `create_toothpastes_table` | `health_toothpastes` | `Toothpaste` | `ToothpasteFactory` |
| `create_exercise_muscle_groups_table` | `health_exercise_muscle_group` | `ExerciseMuscleGroup` | `ExerciseMuscleGroupFactory` |
| `create_category_exercises_table` | `health_category_exercise` | none (pure pivot) | — |
| `create_exercise_workout_table` | `health_exercise_workout` | none (withPivot) | — |
| `create_oral_care_toothpaste_table` | `health_oral_care_toothpaste` | none (pure pivot) | — |

## Models

### Standalone Models
- **Category** — `HasUser`, `SoftDeletes`; `exercises(): BelongsToMany(Exercise)`
- **Exercise** — `HasUser`, `SoftDeletes`; `muscleGroups(): BelongsToMany(MuscleGroup)`, `categories(): BelongsToMany(Category)`
- **MuscleGroup** — `SoftDeletes`; self-referencing parent via `muscle_group_id` (nullable); `exercises(): BelongsToMany(Exercise)`
- **Workout** — `HasUser`, `SoftDeletes`; `exercises(): BelongsToMany(Exercise)` via `exercise_workout` with `withPivot('id', 'reps', 'weight', 'distance', 'duration', 'calorie')`
- **Weight** — `HasUser`, `SoftDeletes`; stores body weight with unit
- **OralCare** — `HasUser`, `SoftDeletes`; brushed/flossed/fluoride flags, duration in minutes
- **Toothpaste** — `SoftDeletes`; brand name only

### Pivot Models
- **ExerciseMuscleGroup** — extends `HealthPivotDefaults`; no soft deletes

### Pure Pivot Tables (no dedicated model)
- `health_category_exercise` — Category ↔ Exercise
- `health_exercise_workout` — Workout ↔ Exercise (extra cols: reps, weight, distance, duration, calorie + units)
- `health_oral_care_toothpaste` — OralCare ↔ Toothpaste

## Base Classes
- Models extend `HealthModelDefaults` → `ModelWithDefaults`; sets `tablePrefix = 'health.table_prefix'`
- Pivot models extend `HealthPivotDefaults` → `PivotWithDefaults`; same prefix

## Enums
- `WeightEnum` — `lbs`, `kg`
- `DistanceEnum` — `kilometer`, `meter`, `mile`
- `DurationEnum` — `second`, `minute`, `hour`
- `CalorieEnum` — `kcal`, `kj`

## Factories
All factories use realistic data — no `faker->word()` or lorem ipsum for names:
- **Category** — picks from 12 real fitness category names
- **Exercise** — picks from 32 real exercise names, each with an accurate description
- **MuscleGroup** — picks from 26 real anatomical names with descriptions; `muscle_group_id` is randomly null or a nested factory
- **Toothpaste** — picks from 15 real brand names
- **Weight** — unit-aware range (50–120 kg / 110–265 lbs), dates within last 2 years
- **OralCare** — duration 1–5 minutes, dates within last year
- **Workout** — dates within last 2 years
- **ExerciseMuscleGroup** — creates Exercise + MuscleGroup via sub-factories

## Settings
Backed by `coleus/settings` (shared `settings` table, no per-package migration). `HealthServiceProvider` binds `'health.settings'` to `app('settings')->group(config('health.settings_prefix').'_general')`, exposed via the `Coleus\Health\Facades\Settings` facade: `Settings::get('timezone', 'UTC')` / `Settings::set('timezone', $value)`. Keys used: `timezone`, `weight_unit`, `distance_unit`, `duration_unit`, `calorie_unit` — each call site passes its own default (see `WeightEnum`, `DistanceEnum`, `DurationEnum`, `CalorieEnum`).

## Inertia / Frontend
- Pages live in `resources/js/pages/`
- Components live in `resources/js/components/{entity}/`
- Layout: `HealthLayout.vue`
- `app.ts` wraps the root render with `resolveComponent('UiApp')` — do not change this
- Vite config at `vite.config.ts`; CSS entry at `resources/css/app.css`
