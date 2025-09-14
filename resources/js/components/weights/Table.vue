<script setup lang="ts">
import TableActions from '@/components/weights/TableActions.vue';
import { WeightCollection, WeightData } from '@/components/weights/weight';
import Header from '@coleus/support/components/table/Header.vue';
import type { TableColumn } from '@nuxt/ui';
import { h, ref } from 'vue';

defineProps<{
    collection?: WeightCollection;
}>();
const sorting = ref();

const columns: TableColumn<WeightData>[] = [
    {
        accessorKey: 'date',
        cell: ({ row }) => `${row.original.date_for_humans}`,
        header: ({ column }) => h(Header, { column: column, label: 'Date' }),
    },
    {
        accessorKey: 'weight',
        cell: ({ row }) => `${row.original.weight} ${row.original.unit}`,
        header: ({ column }) => h(Header, { column: column, label: 'Weight' }),
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { weightId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable :data="collection?.data" :columns="columns" v-model:sorting="sorting" />
</template>
