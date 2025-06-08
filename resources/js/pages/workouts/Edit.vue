<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import EditForm from '@coleus/health/components/workouts/Edit.vue';
import { WorkoutResource } from '@coleus/health/components/workouts/workout';
import { ExerciseCollection } from '@coleus/health/components/exercises/exercise';

defineProps<{
    resource: WorkoutResource;
    exercises: ExerciseCollection;
}>();
</script>

<template>
    <HealthLayout>
        <EditForm :resource="resource" :exercises="exercises" />
    </HealthLayout>
</template>
