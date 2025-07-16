<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import TableCard from '@coleus/health/components/workouts/TableCard.vue';
import type { WorkoutCollection } from '@coleus/health/components/workouts/workout';

defineProps<{
    collection: WorkoutCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
