<script setup lang="ts">
import EditAction from '@coleus/support/components/table/EditAction.vue';
import DeleteAction from '@coleus/support/components/table/DeleteAction.vue';

defineProps<{
    exerciseId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <EditAction :href="route('health.exercises.edit', { exercise: exerciseId })" />
        <DeleteAction :href="route('health.exercises.destroy', { exercise: exerciseId })" />
    </div>
</template>
