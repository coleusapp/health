<script setup lang="ts">
import LineChart from '@coleus/health/components/weights/LineChart.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    data: any;
}>();
</script>

<template>
    <UiCard>
        <div class="mb-8 flex items-center justify-between">
            <h1>Weights Trend</h1>
            <div class="flex gap-2">
                <Link :href="route('health.weights.create')">
                    <UiButton icon="i-lucide-plus">New</UiButton>
                </Link>
                <Link :href="route('health.weights.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All</UiButton>
                </Link>
            </div>
        </div>
        <LineChart class="w-full" :data="data" />
    </UiCard>
</template>
