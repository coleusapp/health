<script setup lang="ts">
import type { ToothpasteCollection } from '@/components/toothpastes/toothpaste';
import { FormKit } from '@formkit/vue';
import { inject } from 'vue';
import { toothpastesKey } from '@/components/oralCares/oralCare';

const toothpastes = inject(toothpastesKey) as ToothpasteCollection;
</script>

<template>
    <FormKit type="datetime-local" name="date" label="Date" validation="required" />
    <FormKit type="number" name="duration" label="Duration" :min="1" help="In minutes" />
    <FormKit type="checkbox" name="brushed" label="Brushed" />
    <FormKit type="checkbox" name="flossed" label="Flossed" />
    <FormKit type="checkbox" name="fluoride_taken" label="Fluoride Taken" />
    <FormKit type="repeater" name="toothpastes" label="Toothpastes" :min="0">
        <template #default="{ value }">
            <FormKit type="select" name="toothpaste_id" label="Name" :options="toothpastes?.data || []" />
        </template>
    </FormKit>
</template>
