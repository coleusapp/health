<script setup lang="ts">
import HealthLayout from '@/layouts/HealthLayout.vue';
import GeneralCard from '@/components/settings/GeneralCard.vue';
import { resourceKey, SettingsResource } from '@/components/settings/settings';
import { provide } from 'vue';

const props = defineProps<{
    resource: SettingsResource;
}>();
provide(resourceKey, props.resource);
</script>

<template>
    <HealthLayout>
        <GeneralCard />
    </HealthLayout>
</template>
