<script setup lang="ts">
import LineChart from '@coleus/health/components/weights/LineChart.vue';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    data: any;
}>();
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Weights Trend">
                <div class="flex gap-2">
                    <Link :href="route('health.weights.create')">
                        <UiButton icon="i-lucide-plus">New</UiButton>
                    </Link>
                    <Link :href="route('health.weights.index')">
                        <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All</UiButton>
                    </Link>
                </div>
            </Header>
        </template>
        <LineChart class="w-full" :data="data" />
    </UiCard>
</template>
