<script setup lang="ts">
import HealthLayout from '@/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';
import type { WeightCollection } from '@/components/weights/weight';
import type { CategoryCollection } from '@/components/categories/category';
import type { MuscleGroupCollection } from '@/components/muscleGroups/muscleGroup';
import type { ExerciseCollection } from '@/components/exercises/exercise';
import type { WorkoutCollection } from '@/components/workouts/workout';

defineProps<{
    weights: WeightCollection;
    categories: CategoryCollection;
    muscle_groups: MuscleGroupCollection;
    // toothpastes: ToothpasteCollection;
    exercises: ExerciseCollection;
    workouts: WorkoutCollection;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <HealthLayout></HealthLayout>
</template>
