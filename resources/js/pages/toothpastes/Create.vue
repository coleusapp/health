<script setup lang="ts">
import CreateCard from '@coleus/health/components/Toothpaste/CreateCard.vue';
import { ToothpasteCollection } from '@coleus/health/components/Toothpaste/Toothpaste';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';

defineProps<{
    muscle_groups: ToothpasteCollection;
}>();
</script>

<template>
    <HealthLayout>
        <CreateCard />
    </HealthLayout>
</template>
