<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    weightId: number | string;
}>();
</script>
<template>
    <div class="flex items-center justify-end">
        <UiTooltip text="Edit">
            <Link :href="route('health.weights.edit', { weight: weightId })">
                <UiButton icon="i-lucide-pencil" variant="ghost" color="neutral"></UiButton>
            </Link>
        </UiTooltip>
        <UiTooltip text="Delete">
            <Link
                :href="route('health.weights.destroy', { weight: weightId })"
                method="delete"
                @success="() => $toast.add({ title: 'Weight deleted successfully!' })"
            >
                <UiButton icon="i-lucide-trash" variant="ghost" color="error"></UiButton>
            </Link>
        </UiTooltip>
    </div>
</template>
