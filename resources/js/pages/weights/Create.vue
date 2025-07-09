<script setup lang="ts">
import CreateCard from '@coleus/health/components/weights/CreateCard.vue';
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
        <CreateCard />
    </HealthLayout>
</template>
