<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import type { NavigationMenuItem } from '@nuxt/ui'
import { ref } from 'vue';

const items = ref<NavigationMenuItem[]>([
    {
        label: 'Health',
        icon: 'i-lucide-heart-pulse',
        to: route('health.dashboard'),
        active: route().current('health.dashboard'),
        target: '_self',
    },
    {
        label: 'Weights',
        icon: 'i-lucide-weight',
        to: route('health.weights.index'),
        active: route().current('health.weights.*'),
        target: '_self',
    },
    {
        label: 'Workouts',
        icon: 'i-lucide-dumbbell',
        to: route('health.workouts.index'),
        active: route().current('health.workouts.*'),
        open: route().current('health.workouts.*') || route().current('health.categories.*') || route().current('health.muscle-groups.*') || route().current('health.exercises.*'),
        target: '_self',
        children: [
            {
                label: 'Categories',
                to: route('health.categories.index'),
                active: route().current('health.categories.*'),
                target: '_self',
            },
            {
                label: 'Muscle Groups',
                to: route('health.muscle-groups.index'),
                active: route().current('health.muscle-groups.*'),
                target: '_self',
            },
            {
                label: 'Exercises',
                to: route('health.exercises.index'),
                active: route().current('health.exercises.*'),
                target: '_self',
            },
        ]
    },
    {
        label: 'Oral Cares',
        icon: 'i-lucide-ghost',
        to: route('health.oral-cares.index'),
        active: route().current('health.oral-cares.*'),
        target: '_self',
        open: route().current('health.oral-cares.*') || route().current('health.toothpastes.*'),
        children: [
            {
                label: 'Toothpastes',
                to: route('health.toothpastes.index'),
                active: route().current('health.toothpastes.*'),
                target: '_self',
            }
        ]
    }
]);
</script>

<template>
    <aside>
        <div class="flex md:hidden w-full bg-gray-50 min-h-12 p-2 justify-end border-t border-gray-200">
            <UiDrawer :overlay="false">
                <UiButton color="neutral" variant="ghost" trailing-icon="i-lucide-menu" />
                <template #content>
                    <div class="p-2 overflow-y-scroll">
                        <UiNavigationMenu orientation="vertical" :items="items" class="w-full" />
                    </div>
                </template>
            </UiDrawer>
        </div>
        <div class="hidden md:flex w-full flex-col gap-2 h-full min-w-60 py-2 pl-2 pr-1">
            <UiNavigationMenu orientation="vertical" :items="items" class="w-full"  />
        </div>
    </aside>
</template>
