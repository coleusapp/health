<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { CategoryCollection } from '@coleus/health/components/categories/category';
import TableCard from '@coleus/health/components/categories/TableCard.vue';

defineProps<{
    collection?: CategoryCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
