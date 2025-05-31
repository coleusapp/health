<script setup lang="ts">
import HealthLayout from '@health/layouts/HealthLayout.vue';
import EditForm from '@health/components/workouts/Edit.vue';
import { WorkoutResource } from '@health/components/workouts/workout';
import { ExerciseCollection } from '@health/components/exercises/exercise';

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
