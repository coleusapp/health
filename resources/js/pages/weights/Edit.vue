<script setup lang="ts">
import HealthLayout from '@health/layouts/HealthLayout.vue';
import EditForm from '@health/components/weights/Edit.vue';
import { Resource } from '@health/components/weights/type';

defineProps<{
    resource: Resource;
}>();
</script>

<template>
    <HealthLayout>
        <EditForm :resource="resource" />
    </HealthLayout>
</template>
