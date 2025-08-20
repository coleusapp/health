<script setup lang="ts">
import EditCard from '@coleus/health/components/toothpastes/EditCard.vue';
import { ToothpasteResource, ToothpasteResourceKey } from '@coleus/health/components/toothpastes/toothpaste';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: ToothpasteResource;
}>();
provide(ToothpasteResourceKey, props.resource);
</script>

<template>
    <HealthLayout>
        <EditCard />
    </HealthLayout>
</template>
