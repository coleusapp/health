<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';
import WeightCard from '@coleus/health/components/weights/Card.vue';
import CategoryCard from '@coleus/health/components/categories/Card.vue';
import MuscleGroupCard from '@coleus/health/components/muscleGroups/Card.vue';
import ToothpasteTypeCard from '@coleus/health/components/toothpasteTypes/Card.vue';
import ExerciseCard from '@coleus/health/components/exercises/Card.vue';
import WorkoutCard from '@coleus/health/components/workouts/Card.vue';
import { Collection as WeightCollection } from '@coleus/health/components/weights/type';
import { CategoryCollection } from '@coleus/health/components/categories/category';
import { MuscleGroupCollection } from '@coleus/health/components/muscleGroups/muscleGroup';
import { Collection as ToothpasteTypeCollection } from '@coleus/health/components/toothpasteTypes/type';
import { Collection as ExerciseCollection } from '@coleus/health/components/exercises/exercise';
import { WorkoutCollection } from '@coleus/health/components/workouts/workout';

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
