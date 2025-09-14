<script setup lang="ts">
import TableActions from '@/components/workouts/TableActions.vue';
import { WorkoutCollection, WorkoutData } from '@/components/workouts/workout';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';

defineProps<{
    collection?: WorkoutCollection;
}>();
const columns: TableColumn<WorkoutData>[] = [
    {
        accessorKey: 'date_string',
        header: 'Date',
    },
    {
        accessorKey: 'exercises_count',
        header: 'Exercises Count',
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
