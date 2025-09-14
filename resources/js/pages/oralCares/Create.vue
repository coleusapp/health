<script setup lang="ts">
import CreateCard from '@/components/oralCares/CreateCard.vue';
import { OralCareResource, oralCareResourceKey, toothpastesKey } from '@/components/oralCares/oralCare';
import type { ToothpasteCollection } from '@/components/toothpastes/toothpaste';
import HealthLayout from '@/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: OralCareResource;
    toothpastes: ToothpasteCollection;
}>();
provide(oralCareResourceKey, props.resource);
provide(toothpastesKey, props.toothpastes);
</script>

<template>
    <HealthLayout>
        <CreateCard />
    </HealthLayout>
</template>
