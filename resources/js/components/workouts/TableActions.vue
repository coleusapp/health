<script setup lang="ts">
import EditAction from '@coleus/support/components/table/EditAction.vue';
import DeleteAction from '@coleus/support/components/table/DeleteAction.vue';

defineProps<{
    workoutId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <EditAction :href="route('health.workouts.edit', { workout: workoutId })" />
        <DeleteAction :href="route('health.workouts.destroy', { workout: workoutId })" />
    </div>
</template>
