<script setup lang="ts">
import type { NavigationMenuItem } from '@nuxt/ui';
import { ref } from 'vue';

const open = ref(false);

const links = [
    [
        {
            label: 'Dashboard',
            icon: 'i-lucide-heart-pulse',
            to: route('health.dashboard', [], false),
            exact: true,
            onSelect: () => {
                open.value = false;
            },
        },
        {
            label: 'Weights',
            icon: 'i-lucide-weight',
            to: route('health.weights.index', [], false),
            onSelect: () => {
                open.value = false;
            },
        },
        {
            label: 'Workouts',
            icon: 'i-lucide-dumbbell',
            to: route('health.workouts.index', [], false),
            open:
                route().current('health.workouts.*') ||
                route().current('health.categories.*') ||
                route().current('health.muscle-groups.*') ||
                route().current('health.exercises.*'),
            onSelect: () => {
                open.value = false;
            },
            children: [
                {
                    label: 'Categories',
                    to: route('health.categories.index', [], false),
                    onSelect: () => {
                        open.value = false;
                    },
                },
                {
                    label: 'Muscle Groups',
                    to: route('health.muscle-groups.index', [], false),
                    onSelect: () => {
                        open.value = false;
                    },
                },
                {
                    label: 'Exercises',
                    to: route('health.exercises.index', [], false),
                    onSelect: () => {
                        open.value = false;
                    },
                },
            ],
        },
        {
            label: 'Oral Cares',
            icon: 'i-lucide-ghost',
            to: route('health.oral-cares.index', [], false),
            open: route().current('health.oral-cares.*') || route().current('health.toothpastes.*'),
            children: [
                {
                    label: 'Toothpastes',
                    to: route('health.toothpastes.index', [], false),
                }
            ]
        }
    ],
] satisfies NavigationMenuItem[][];
</script>

<template>
    <UiDashboardSidebar id="health-sidebar" v-model:open="open" collapsible class="bg-elevated/10">
        <template #header="{ collapsed }">
            <UiDashboardSidebarCollapse variant="ghost" side="right" />
            <span v-if="!collapsed">Health</span>
        </template>
        <template #default="{ collapsed }">
            <UiNavigationMenu :collapsed="collapsed" :items="links[0]" orientation="vertical" tooltip popover />

            <UiNavigationMenu :collapsed="collapsed" :items="links[1]" orientation="vertical" tooltip class="mt-auto" />
        </template>
    </UiDashboardSidebar>
    <!-- <aside> -->
    <!--     <div class="flex md:hidden w-full bg-gray-50 min-h-12 p-2 justify-end border-t border-gray-200"> -->
    <!--         <UiDrawer :overlay="false"> -->
    <!--             <UiButton color="neutral" variant="ghost" trailing-icon="i-lucide-menu" /> -->
    <!--             <template #content> -->
    <!--                 <div class="p-2 overflow-y-scroll"> -->
    <!--                     <UiNavigationMenu orientation="vertical" :items="items" class="w-full" /> -->
    <!--                 </div> -->
    <!--             </template> -->
    <!--         </UiDrawer> -->
    <!--     </div> -->
    <!--     <div class="hidden md:flex w-full flex-col gap-2 h-full min-w-60 py-2 pl-2 pr-1"> -->
    <!--         <UiNavigationMenu orientation="vertical" :items="items" class="w-full"  /> -->
    <!--     </div> -->
    <!-- </aside> -->
</template>
