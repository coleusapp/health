<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';
import CreateWeight from "@coleus/health/components/weights/Create.vue";
import { Resource } from '@coleus/health/components/weights/type';

defineProps<{
    resource: Resource;
}>();
</script>

<template>
    <Head title="Create Weight" />
    <HealthLayout>
        <CreateWeight :resource="resource" />
    </HealthLayout>
</template>
