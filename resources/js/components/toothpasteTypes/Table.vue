<script setup lang="ts">
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';
import TableActions from '@coleus/health/components/toothpasteTypes/parts/TableActions.vue';
import { Collection, Data } from '@coleus/health/components/toothpasteTypes/type';

defineProps<{
    collection?: Collection;
}>();

const columns: TableColumn<Data>[] = [
    {
        accessorKey: 'name',
        header: 'Name',
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { toothpasteTypeId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable :data="collection?.data" :columns="columns" />
</template>
