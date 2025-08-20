<script setup lang="ts">
import CreateCard from '@coleus/health/components/oralCares/CreateCard.vue';
import { toothpastesKey } from '@coleus/health/components/oralCares/oralCare';
import type { ToothpasteCollection } from '@coleus/health/components/toothpastes/toothpaste';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    toothpastes: ToothpasteCollection;
}>();
provide(toothpastesKey, props.toothpastes);
</script>

<template>
    <HealthLayout>
        <CreateCard />
    </HealthLayout>
</template>
