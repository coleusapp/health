<script setup lang="ts">
import EditWeight from '@coleus/health/components/weights/Edit.vue';
import { WeightResource, resourceKey } from '@coleus/health/components/weights/weight';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: WeightResource;
}>();
provide(resourceKey, props.resource);
</script>

<template>
    <HealthLayout>
        <EditWeight />
    </HealthLayout>
</template>
