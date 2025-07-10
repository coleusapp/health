<script setup lang="ts">
import EditCard from '@coleus/health/components/categories/EditCard.vue';
import { CategoryResource, resourceKey } from '@coleus/health/components/categories/category';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: CategoryResource;
}>();
provide(resourceKey, props.resource);
</script>

<template>
    <HealthLayout>
        <EditCard />
    </HealthLayout>
</template>
