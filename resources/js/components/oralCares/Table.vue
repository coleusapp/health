<script setup lang="ts">
import TableActions from '@coleus/health/components/oralCares/TableActions.vue';
import type { OralCareCollection, OralCareData } from '@coleus/health/components/oralCares/oralCare';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';
import IconColumn from '@/components/ui/table/columns/IconColumn.vue';
import { IconColumnProps } from '@/components/ui/table/columns/IconColumnProps';

defineProps<{
    collection: OralCareCollection;
}>();

const columns: TableColumn<OralCareData>[] = [
    {
        accessorKey: 'date_string',
        header: 'Date',
    },
    {
        accessorKey: 'duration',
        header: 'Duration',
    },
    {
        accessorKey: 'brushed',
        header: 'Brushed',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(!!row?.original?.brushed).build()),
    },
    {
        accessorKey: 'flossed',
        header: 'Flossed',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(!!row?.original?.flossed).build()),
    },
    {
        accessorKey: 'fluoride_taken',
        header: 'Fluoride Taken',
        cell: ({ row }) => h(IconColumn, new IconColumnProps().make(!!row?.original?.fluoride_taken).build()),
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { oralCareId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable
        :data="collection?.data"
        :columns="columns"
        :pagination="{
            pageIndex: 0,
            pageSize: 15,
        }"
    />
</template>
