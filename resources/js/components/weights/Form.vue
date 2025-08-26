<script setup lang="ts">
import { OptionCollection } from '@/types';
import {
    weightUnitsKey,
} from '@coleus/health/components/weights/weight';
import { FormKit } from '@formkit/vue';
import { inject } from 'vue';

const weightUnits = inject(weightUnitsKey) as OptionCollection;
</script>

<template>
    <FormKit type="number" name="weight" label="Weight" validation="required|number" />
    <FormKit type="datetime-local" name="date" label="Date Time" validation="required" />
    <FormKit type="select" name="unit" label="Unit" :options="weightUnits?.data" key="unit" validation="required" />
</template>
