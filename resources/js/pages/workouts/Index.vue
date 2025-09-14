<script setup lang="ts">
import HealthLayout from '@/layouts/HealthLayout.vue';
import TableCard from '@/components/workouts/TableCard.vue';
import type { WorkoutCollection } from '@/components/workouts/workout';

defineProps<{
    collection: WorkoutCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
