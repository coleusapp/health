<script setup lang="ts">
import EditAction from '@coleus/support/components/table/EditAction.vue';
import DeleteAction from '@coleus/support/components/table/DeleteAction.vue';

defineProps<{
    muscleGroupId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <EditAction :href="route('health.muscle-groups.edit', { muscle_group: muscleGroupId })" />
        <DeleteAction :href="route('health.muscle-groups.destroy', { muscle_group: muscleGroupId })" />
    </div>
</template>
