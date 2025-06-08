<script setup lang="ts">
import EditAction from '@coleus/support/components/table/EditAction.vue';
import DeleteAction from '@coleus/support/components/table/DeleteAction.vue';

defineProps<{
    categoryId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <EditAction :href="route('health.categories.edit', { category: categoryId })" />
        <DeleteAction :href="route('health.categories.destroy', { category: categoryId })" />
    </div>
</template>
