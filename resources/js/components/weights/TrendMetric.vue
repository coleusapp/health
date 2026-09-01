<script setup lang="ts">
import LineChart from '@/components/weights/LineChart.vue';
import Header from '@coleus/support/components/card/Header.vue';
import { Link, router } from '@inertiajs/vue3';
import type { DropdownMenuItem } from '@nuxt/ui';
import { useLocalStorage } from '@vueuse/core';
import { computed, onMounted, ref } from 'vue';

defineProps<{
    data: any;
}>();

const period = useLocalStorage<'daily' | 'monthly'>('health-weights-trend-period', 'monthly');
const loading = ref(false);

const setPeriod = (value: 'daily' | 'monthly') => {
    period.value = value;

    router.reload({
        data: { period: value },
        only: ['weights_chart'],
        onStart: () => {
            loading.value = true;
        },
        onFinish: () => {
            loading.value = false;
        },
    });
};

onMounted(() => {
    if (period.value !== 'monthly') {
        setPeriod(period.value);
    }
});

const periodItems = computed<DropdownMenuItem[]>(() => [
    {
        label: 'Daily',
        type: 'checkbox',
        checked: period.value === 'daily',
        onSelect: (e) => {
            e.preventDefault();

            setPeriod('daily');
        },
    },
    {
        label: 'Monthly',
        type: 'checkbox',
        checked: period.value === 'monthly',
        onSelect: (e) => {
            e.preventDefault();

            setPeriod('monthly');
        },
    },
]);
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Weights Trend">
                <template #title-suffix>
                    <UiDropdownMenu :items="periodItems">
                        <UiButton icon="i-lucide-settings" variant="ghost" color="neutral" />
                    </UiDropdownMenu>
                </template>
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
        <LineChart v-if="!loading" class="w-full min-h-72" :data="data" />
        <UiSkeleton v-else class="w-full min-h-72" />
    </UiCard>
</template>
