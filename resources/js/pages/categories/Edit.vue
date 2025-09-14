<script setup lang="ts">
import EditCard from '@/components/categories/EditCard.vue';
import { CategoryResource, resourceKey } from '@/components/categories/category';
import HealthLayout from '@/layouts/HealthLayout.vue';
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
