<script setup lang="ts">
import EditCard from '@/components/toothpastes/EditCard.vue';
import { ToothpasteResource, ToothpasteResourceKey } from '@/components/toothpastes/toothpaste';
import HealthLayout from '@/layouts/HealthLayout.vue';
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
