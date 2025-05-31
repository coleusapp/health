<script setup lang="ts">
import ButtonLink from '@/components/ButtonLink.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';
import { Table } from '@/components/ui/table';
import AppLayout from '@/layouts/AppLayout.vue';
import { CategoryTable } from '@health/types/category';
import { Head } from '@inertiajs/vue3';
import ContentColumn from '@/components/ContentColumn.vue';
import HealthLayout from '@health/layouts/HealthLayout.vue';

defineProps<{
    table?: CategoryTable;
}>();
</script>

<template>
    <AppLayout>
        <Head title="Weights" />
        <HealthLayout>
            <ContentColumn>
                <HeadingSmall title="Categories">
                    <ButtonLink :href="route('health.categories.create')" icon="Plus">New Category</ButtonLink>
                </HeadingSmall>
                <Table :headers="table?.headers || []" :records="table?.records?.data || []" :columns="table?.columns || []" #default="{ record }">
                    <!--<TableActionLink :href="route('health.categories.edit', { category: record })">Edit</TableActionLink>-->
                    <!--<TableActionLink :href="route('health.categories.destroy', { category: record })" method="delete"> Delete </TableActionLink>-->
                </Table>
            </ContentColumn>
        </HealthLayout>
    </AppLayout>
</template>

