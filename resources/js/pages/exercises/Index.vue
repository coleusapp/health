<script setup lang="ts">
import WeightTable from '@health/components/weights/Table.vue';
import HealthLayout from '@health/layouts/HealthLayout.vue';
import { Collection } from '@health/components/weights/type';

defineProps<{
    collection?: Collection;
}>();
</script>

<template>
    <HealthLayout>
        <WeightTable :collection="collection" />
    </HealthLayout>
</template>
