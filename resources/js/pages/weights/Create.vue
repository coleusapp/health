<script setup lang="ts">
import { OptionCollection } from '@/types';
import CreateCard from '@coleus/health/components/weights/CreateCard.vue';
import { WeightResource, resourceKey, weightUnitsKey } from '@coleus/health/components/weights/weight';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: WeightResource;
    weight_units: OptionCollection;
}>();
provide(resourceKey, props.resource);
provide(weightUnitsKey, props.weight_units);
</script>

<template>
    <HealthLayout>
        <CreateCard />
    </HealthLayout>
</template>
