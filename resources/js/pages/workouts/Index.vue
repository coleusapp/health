<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import WorkoutsTable from '@coleus/health/components/workouts/Table.vue';
import { WorkoutCollection } from '@coleus/health/components/workouts/workout';

defineProps<{
    collection?: WorkoutCollection;
}>();
</script>

<template>
    <HealthLayout>
        <WorkoutsTable :collection="collection" />
    </HealthLayout>
</template>
