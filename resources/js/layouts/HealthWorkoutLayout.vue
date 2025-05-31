<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import HealthLayout from '@health/layouts/HealthLayout.vue';
import type { Table as TableType } from '@/types';
import { Tabs } from '@/components/ui/tabs';
import { useSlots } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Workouts',
        href: '/workouts',
    },
];

defineProps<{
    table?: TableType;
}>();
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Workout" />
        <HealthLayout>
            <Tabs :tabs="['workouts', 'categories']">
                <template #workouts-tab>
                    <Link :href="route('health.workouts.index')">Workouts</Link>
                </template>
                <template #categories-tab>
                    <Link :href="route('health.categories.index')">Categories</Link>
                </template>
                <template #workouts-content>
                    <slot name="workouts" />
                </template>
                <template #categories-content>
                    <slot name="categories" />
                </template>
            </Tabs>
        </HealthLayout>
    </AppLayout>
</template>
