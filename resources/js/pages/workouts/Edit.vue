<script setup lang="ts">
import { ExerciseCollection, exerciseCollectionKey } from '@coleus/health/components/exercises/exercise';
import EditWorkout from '@coleus/health/components/workouts/Edit.vue';
import { WorkoutResource, workoutResourceKey } from '@coleus/health/components/workouts/workout';
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
        <EditWorkout />
    </HealthLayout>
</template>
