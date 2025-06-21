<script setup lang="ts">
import CreateWorkout from '@coleus/health/components/workouts/Create.vue';
import { WorkoutResource, workoutResourceKey } from '@coleus/health/components/workouts/workout';
import { ExerciseCollection, exerciseCollectionKey } from '@coleus/health/components/exercises/exercise';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: WorkoutResource;
    exercises: ExerciseCollection;
}>();
provide(workoutResourceKey, props.resource);
provide(exerciseCollectionKey, props.exercises);
</script>

<template>
    <HealthLayout>
        <CreateWorkout />
    </HealthLayout>
</template>
