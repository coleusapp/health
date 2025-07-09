<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { WeightCollection } from '@coleus/health/components/weights/weight';
import TableCard from '@coleus/health/components/weights/TableCard.vue';

defineProps<{
    collection?: WeightCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
