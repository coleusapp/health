<script setup lang="ts">
import { CategoryCollection } from '@coleus/health/components/categories/type';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import CategoriesTable from '@coleus/health/components/categories/Table.vue';

defineProps<{
    collection: CategoryCollection;
}>();
</script>
<template>
    <HealthLayout>
        <CategoriesTable :collection="collection" />
    </HealthLayout>
</template>

