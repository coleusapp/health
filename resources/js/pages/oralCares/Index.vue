<script setup lang="ts">
import OralCareCard from '@coleus/health/components/oralCares/TableCard.vue';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { OralCareCollection } from '@coleus/health/components/oralCares/oralCare';

defineProps<{
    collection: OralCareCollection;
}>();
</script>

<template>
    <HealthLayout>
        <OralCareCard :collection="collection" />
    </HealthLayout>
</template>
