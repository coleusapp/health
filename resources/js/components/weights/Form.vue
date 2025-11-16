<script setup lang="ts">
import { OptionCollection } from '@/types';
import {
    weightUnitsKey,
} from '@/components/weights/weight';
import { FormKit } from '@formkit/vue';
import { inject } from 'vue';

const weightUnits = inject(weightUnitsKey) as OptionCollection;
</script>

<template>
    <FormKit type="datetime-local" name="date" label="Date Time" validation="required" />
    <div class="flex items-end gap-2">
        <FormKit type="number" name="weight" label="Weight" validation="required|number" step="0.1" outer-class="grow" />
        <FormKit type="select" name="unit" label="Unit" :options="weightUnits?.data" key="unit" validation="required" wrapper-class="!mb-0" outer-class="grow-0" />
    </div>
</template>
