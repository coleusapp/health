<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateWorkout from "@coleus/health/components/workouts/Create.vue";
import { WorkoutResource } from '@coleus/health/components/workouts/workout';

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
