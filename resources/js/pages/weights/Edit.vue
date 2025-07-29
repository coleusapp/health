<script setup lang="ts">
import EditCard from '@coleus/health/components/weights/EditCard.vue';
import { WeightResource, resourceKey, weightUnitsKey } from '@coleus/health/components/weights/weight';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';
import { OptionCollection } from '@/types';

const props = defineProps<{
    resource: WeightResource;
    weight_units: OptionCollection;
}>();
provide(resourceKey, props.resource);
provide(weightUnitsKey, props.weight_units);
</script>

<template>
    <HealthLayout>
        <EditCard />
    </HealthLayout>
</template>
