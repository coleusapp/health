<script setup lang="ts">
import HealthLayout from '@/layouts/HealthLayout.vue';
import { WeightCollection } from '@/components/weights/weight';
import TableCard from '@/components/weights/TableCard.vue';

defineProps<{
    collection?: WeightCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
