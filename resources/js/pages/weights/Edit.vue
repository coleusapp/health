<script setup lang="ts">
import EditCard from '@coleus/health/components/weights/EditCard.vue';
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
        <EditCard />
    </HealthLayout>
</template>
