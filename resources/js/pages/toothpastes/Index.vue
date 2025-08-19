<script setup lang="ts">
import ToothpasteCard from '@coleus/health/components/toothpastes/TableCard.vue';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { ToothpasteCollection } from '@coleus/health/components/toothpastes/toothpaste';

defineProps<{
    collection: ToothpasteCollection;
}>();
</script>

<template>
    <HealthLayout>
        <ToothpasteCard :collection="collection" />
    </HealthLayout>
</template>
