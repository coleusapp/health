<script setup lang="ts">
import WeightTable from '@coleus/health/components/weights/Table.vue';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { WeightCollection } from '@coleus/health/components/weights/weight';

defineProps<{
    collection?: WeightCollection;
}>();
</script>

<template>
    <HealthLayout>
        <WeightTable :collection="collection" />
    </HealthLayout>
</template>
