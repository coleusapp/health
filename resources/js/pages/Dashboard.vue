<script setup lang="ts">
import HealthLayout from '@health/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';
import WeightCard from '@health/components/weights/Card.vue';
import CategoryCard from '@health/components/categories/Card.vue';
import MuscleGroupCard from '@health/components/muscleGroups/Card.vue';
import ToothpasteTypeCard from '@health/components/toothpasteTypes/Card.vue';
import ExerciseCard from '@health/components/exercises/Card.vue';
import WorkoutCard from '@health/components/workouts/Card.vue';
import { Collection as WeightCollection } from '@health/components/weights/type';
import { CategoryCollection } from '@health/components/categories/category';
import { MuscleGroupCollection } from '@health/components/muscleGroups/muscleGroup';
import { Collection as ToothpasteTypeCollection } from '@health/components/toothpasteTypes/type';
import { Collection as ExerciseCollection } from '@health/components/exercises/type';
import { WorkoutCollection } from '@health/components/workouts/workout';

defineProps<{
    weights: WeightCollection;
    categories: CategoryCollection;
    muscle_groups: MuscleGroupCollection;
    toothpaste_types: ToothpasteTypeCollection;
    exercises: ExerciseCollection;
    workouts: WorkoutCollection;
}>();
</script>

<template>
    <Head title="Dashboard" />

    <HealthLayout>
        <div class="flex flex-wrap gap-4 w-full">
            <WorkoutCard class="w-full" :collection="workouts" />

            <ExerciseCard class="w-full" :collection="exercises" />

            <WeightCard class="w-full" :collection="weights" />
            <CategoryCard class="w-full" :collection="categories" />
            <MuscleGroupCard class="w-full" :collection="muscle_groups" />
            <ToothpasteTypeCard class="w-full" :collection="toothpaste_types" />
        </div>
    </HealthLayout>
</template>
