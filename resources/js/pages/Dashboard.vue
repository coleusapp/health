<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';
import type { WeightCollection } from '@coleus/health/components/weights/weight';
import type { CategoryCollection } from '@coleus/health/components/categories/category';
import type { MuscleGroupCollection } from '@coleus/health/components/muscleGroups/muscleGroup';
import type { ExerciseCollection } from '@coleus/health/components/exercises/exercise';
import type { WorkoutCollection } from '@coleus/health/components/workouts/workout';
import TrendMetric from '../components/weights/TrendMetric.vue';

defineProps<{
    weights: WeightCollection;
    categories: CategoryCollection;
    muscle_groups: MuscleGroupCollection;
    // toothpastes: ToothpasteCollection;
    exercises: ExerciseCollection;
    workouts: WorkoutCollection;
    weights_chart: any,
}>();
</script>

<template>
    <Head title="Dashboard" />

    <HealthLayout>
        <div class="flex flex-wrap gap-4 w-full">
            <TrendMetric class="w-full max-w-1/2" :data="weights_chart" />
        </div>
    </HealthLayout>
</template>
