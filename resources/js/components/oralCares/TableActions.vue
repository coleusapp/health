<script setup lang="ts">
import EditAction from '@coleus/support/components/table/EditAction.vue';
import DeleteAction from '@coleus/support/components/table/DeleteAction.vue';

defineProps<{
    oralCareId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <EditAction :href="route('health.oral-cares.edit', { oral_care: oralCareId })" />
        <DeleteAction :href="route('health.oral-cares.destroy', { oral_care: oralCareId })" />
    </div>
</template>
