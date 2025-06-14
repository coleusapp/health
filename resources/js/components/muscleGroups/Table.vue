<script setup lang="ts">
import TableActions from '@coleus/health/components/muscleGroups/TableActions.vue';
import { MuscleGroupCollection, MuscleGroupData } from '@coleus/health/components/muscleGroups/muscleGroup';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';

defineProps<{
    collection?: MuscleGroupCollection;
}>();

const columns: TableColumn<MuscleGroupData>[] = [
    {
        accessorKey: 'name',
        header: 'Name',
    },
    {
        accessorKey: 'description',
        header: 'Description',
    },
    {
        accessorKey: 'muscle_group_id',
        header: 'Muscle Group',
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { muscleGroupId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable :data="collection?.data" :columns="columns" />
</template>
