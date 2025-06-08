<script setup lang="ts">
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';
import TableActions from '@coleus/health/components/weights/parts/TableActions.vue';
import { Collection, Data } from '@coleus/health/components/weights/type';

defineProps<{
    collection?: Collection;
}>();

const columns: TableColumn<Data>[] = [
    {
        accessorKey: 'date',
        cell: ({ row }) => `${row.original.date_for_humans}`,
        header: 'Date',
    },
    {
        accessorKey: 'weight',
        header: 'Weight',
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { weightId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable :data="collection?.data" :columns="columns" />
</template>
