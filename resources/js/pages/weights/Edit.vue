<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import EditForm from '@coleus/health/components/weights/Edit.vue';
import { Resource } from '@coleus/health/components/weights/type';

defineProps<{
    resource: Resource;
}>();
</script>

<template>
    <HealthLayout>
        <EditForm :resource="resource" />
    </HealthLayout>
</template>
