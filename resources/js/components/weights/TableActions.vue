<script setup lang="ts">
import EditAction from '@coleus/support/components/table/EditAction.vue';
import DeleteAction from '@coleus/support/components/table/DeleteAction.vue';

defineProps<{
    weightId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <EditAction :href="route('health.weights.edit', { weight: weightId })" />
        <DeleteAction :href="route('health.weights.destroy', { weight: weightId })" />
    </div>
</template>
