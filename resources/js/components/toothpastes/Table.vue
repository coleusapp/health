<script setup lang="ts">
import TableActions from '@coleus/health/components/toothpastes/TableActions.vue';
import type { ToothpasteCollection, ToothpasteData } from '@coleus/health/components/toothpastes/toothpaste';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';

defineProps<{
    collection: ToothpasteCollection;
}>();

const columns: TableColumn<ToothpasteData>[] = [
    {
        accessorKey: 'name',
        header: 'Name',
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { toothpasteId: row?.original?.id }),
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
