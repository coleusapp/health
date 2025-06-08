<script setup lang="ts">
import TableActions from '@coleus/health/components/categories/TableActions.vue';
import { CategoryCollection, CategoryData } from '@coleus/health/components/categories/type';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';

defineProps<{
    collection?: CategoryCollection;
}>();

const columns: TableColumn<CategoryData>[] = [
    {
        accessorKey: 'name',
        header: 'Name',
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { categoryId: row?.original?.id }),
    },
];
</script>

<template>
    <UiTable :data="collection?.data" :columns="columns" />
</template>
