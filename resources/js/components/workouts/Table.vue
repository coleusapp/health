<script setup lang="ts">
import TableActions from '@health/components/workouts/parts/TableActions.vue';
import { WorkoutCollection, WorkoutData } from '@health/components/workouts/workout';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';

defineProps<{
    collection?: WorkoutCollection;
}>();
const columns: TableColumn<WorkoutData>[] = [
    {
        accessorKey: 'date',
        header: 'Date',
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { workoutId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable :data="collection?.data" :columns="columns" />
</template>
