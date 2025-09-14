<script setup lang="ts">
import OralCareCard from '@/components/oralCares/TableCard.vue';
import HealthLayout from '@/layouts/HealthLayout.vue';
import { OralCareCollection } from '@/components/oralCares/oralCare';

defineProps<{
    collection: OralCareCollection;
}>();
</script>

<template>
    <HealthLayout>
        <OralCareCard :collection="collection" />
    </HealthLayout>
</template>
