<script setup lang="ts">
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';
import TableActions from '@health/components/categories/parts/TableActions.vue';
import { CategoryCollection, CategoryData } from '@health/components/categories/category';

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
