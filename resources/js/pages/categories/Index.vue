<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import CategoriesTable from '@coleus/health/components/categories/Table.vue';
import { CategoryCollection } from '@coleus/health/components/categories/category';

defineProps<{
    collection?: CategoryCollection;
}>();
</script>

<template>
    <HealthLayout>
        <CategoriesTable :collection="collection" />
    </HealthLayout>
</template>
