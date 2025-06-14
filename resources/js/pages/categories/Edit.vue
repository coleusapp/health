<script setup lang="ts">
import EditCategory from '@coleus/health/components/categories/Edit.vue';
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
        <EditCategory />
    </HealthLayout>
</template>
