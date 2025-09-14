<script setup lang="ts">
import ToothpasteCard from '@/components/toothpastes/TableCard.vue';
import HealthLayout from '@/layouts/HealthLayout.vue';
import { ToothpasteCollection } from '@/components/toothpastes/toothpaste';

defineProps<{
    collection: ToothpasteCollection;
}>();
</script>

<template>
    <HealthLayout>
        <ToothpasteCard :collection="collection" />
    </HealthLayout>
</template>
