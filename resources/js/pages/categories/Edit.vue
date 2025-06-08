<script setup lang="ts">
import Edit from '@coleus/health/components/categories/Edit.vue';
import { CategoryResource } from '@coleus/health/components/categories/type';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';

defineProps<{
    resource: CategoryResource;
}>();
</script>

<template>
    <HealthLayout>
        <Edit :resource="resource" />
    </HealthLayout>
</template>
