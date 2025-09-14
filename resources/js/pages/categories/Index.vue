<script setup lang="ts">
import HealthLayout from '@/layouts/HealthLayout.vue';
import { CategoryCollection } from '@/components/categories/category';
import TableCard from '@/components/categories/TableCard.vue';

defineProps<{
    collection?: CategoryCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
