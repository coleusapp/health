<script setup lang="ts">
import IconColumn from '@/components/ui/table/columns/IconColumn.vue';
import { IconColumnProps } from '@/components/ui/table/columns/IconColumnProps';
import TableActions from '@coleus/health/components/exercises/parts/TableActions.vue';
import { Collection, Data } from '@coleus/health/components/exercises/type';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';
import BadgeColumn from '@/components/ui/table/columns/BadgeColumn.vue';

defineProps<{
    collection?: Collection;
}>();
const columns: TableColumn<Data>[] = [
    {
        accessorKey: 'name',
        header: 'Name',
    },
    {
        accessorKey: 'description',
        header: 'Description',
    },
    {
        accessorKey: 'has_rep',
        header: 'Has Rep',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(row?.original?.has_rep).build()),
    },
    {
        accessorKey: 'has_weight',
        header: 'Has Weight',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(row?.original?.has_weight).build()),
    },
    {
        accessorKey: 'has_distance',
        header: 'Has Distance',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(row?.original?.has_distance).build()),
    },
    {
        accessorKey: 'distance_unit',
        header: 'Distance Unit',
        cell: ({ row }) => h(BadgeColumn, row?.original?.distance_unit),
    },
    {
        accessorKey: 'has_calorie',
        header: 'Has Calorie',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(row?.original?.has_calorie).build()),
    },
    {
        accessorKey: 'has_duration',
        header: 'Has Duration',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(row?.original?.has_duration).build()),
    },
    {
        accessorKey: 'duration_unit',
        header: 'Duration Unit',
        cell: ({ row }) => h(BadgeColumn, row?.original?.distance_unit),
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { exerciseId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable :data="collection?.data" :columns="columns" />
</template>
