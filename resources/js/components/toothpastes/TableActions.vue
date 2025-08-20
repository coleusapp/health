<script setup lang="ts">
import EditAction from '@coleus/support/components/table/EditAction.vue';
import DeleteAction from '@coleus/support/components/table/DeleteAction.vue';

defineProps<{
    toothpasteId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <EditAction :href="route('health.toothpastes.edit', { toothpaste: toothpasteId })" />
        <DeleteAction :href="route('health.toothpastes.destroy', { toothpaste: toothpasteId })" />
    </div>
</template>
