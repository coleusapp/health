<script setup lang="ts">
import TableActions from '@/components/muscleGroups/TableActions.vue';
import type { MuscleGroupCollection, MuscleGroupData } from '@/components/muscleGroups/muscleGroup';
import type { TableColumn } from '@nuxt/ui';
import { h } from 'vue';

defineProps<{
    collection: MuscleGroupCollection;
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
        accessorKey: 'parent.name',
        header: 'Muscle Group',
    },
    {
        id: 'actions',
        cell: ({ row }) => h(TableActions, { muscleGroupId: row?.original?.id }),
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
