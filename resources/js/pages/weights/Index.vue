<script setup lang="ts">
import TableCard from '@/components/weights/TableCard.vue';
import TrendMetric from '@/components/weights/TrendMetric.vue';
import { WeightCollection } from '@/components/weights/weight';
import HealthLayout from '@/layouts/HealthLayout.vue';

defineProps<{
    collection?: WeightCollection;
    weights_chart?: any;
}>();
</script>

<template>
    <HealthLayout class="flex flex-col gap-2">
        <TrendMetric class="w-full" :data="weights_chart" />
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
