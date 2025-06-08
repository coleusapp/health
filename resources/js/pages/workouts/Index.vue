<script setup lang="ts">
import WeightTable from '@coleus/health/components/weights/Table.vue';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { Collection } from '@coleus/health/components/weights/type';

defineProps<{
    collection?: Collection;
}>();
</script>

<template>
    <HealthLayout>
        <WeightTable :collection="collection" />
    </HealthLayout>
</template>
