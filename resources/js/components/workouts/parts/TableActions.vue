<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    workoutId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <UiTooltip text="Edit">
            <Link :href="route('health.workouts.edit', { workout: workoutId })">
                <UiButton icon="i-lucide-pencil" variant="ghost" color="neutral"></UiButton>
            </Link>
        </UiTooltip>
        <UiTooltip text="Delete">
            <Link
                :href="route('health.workouts.destroy', { workout: workoutId })"
                method="delete"
                @success="() => $toast.add({ title: 'Exercise deleted successfully!' })"
            >
                <UiButton icon="i-lucide-trash" variant="ghost" color="error"></UiButton>
            </Link>
        </UiTooltip>
    </div>
</template>
