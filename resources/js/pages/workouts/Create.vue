<script setup lang="ts">
import HealthLayout from '@health/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateWorkout from "@health/components/workouts/Create.vue";
import { WorkoutResource } from '@health/components/workouts/workout';

defineProps<{
    resource: WorkoutResource;
}>();
</script>

<template>
    <Head title="Create Workout" />
    <HealthLayout>
        <CreateWorkout :resource="resource" />
    </HealthLayout>
</template>
