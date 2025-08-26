<script setup lang="ts">
import TableActions from '@coleus/health/components/weights/TableActions.vue';
import Header from '@coleus/support/components/table/Header.vue';
import { WeightCollection, WeightData } from '@coleus/health/components/weights/weight';
import type { TableColumn } from '@nuxt/ui';
import { h, ref, resolveComponent } from 'vue';
import { router } from '@inertiajs/core';

defineProps<{
    collection?: WeightCollection;
}>();
const sorting = ref();
const options = ref();

const UiButton = resolveComponent('UiButton')

const columns: TableColumn<WeightData>[] = [
    {
        accessorKey: 'date',
        cell: ({ row }) => `${row.original.date_for_humans}`,
        header: ({ column }) => h(Header, { column: column, label: 'Date' }),
        sortingFn: (rowA, rowB, columnId) => {
            console.log(rowA, rowB, columnId);
            return rowA.original.someProperty - rowB.original.someProperty
        },
    },
    {
        accessorKey: 'weight',
        cell: ({ row }) => `${row.original.weight} ${row.original.unit}`,
        header: ({ column }) => h(Header, { column: column, label: 'Weight' }),
        sortingFn: (rowA, rowB, columnId) => {
            (sorting.value || []).forEach((item) => {

            });
            // router.reload({data: {sort: `${columnId}`}})
        },
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { weightId: row?.original?.id }),
    },
];
</script>

<template>
    {{sorting}}{{options}}
    <UiTable :data="collection?.data" :columns="columns" v-model:sorting="sorting" v-model:sorting-options="options" />
</template>
