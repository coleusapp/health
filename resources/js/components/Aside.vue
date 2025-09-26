<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import type { NavigationMenuItem } from '@nuxt/ui'
import { ref } from 'vue';

const items = ref<NavigationMenuItem[][]>([
    [
        {
            label: 'Links',
            type: 'label'
        },
        {
            label: 'Guide',
            icon: 'i-lucide-book-open',
            children: [
                {
                    label: 'Introduction',
                    description: 'Fully styled and customizable components for Nuxt.',
                    icon: 'i-lucide-house'
                },
                {
                    label: 'Installation',
                    description: 'Learn how to install and configure Nuxt UI in your application.',
                    icon: 'i-lucide-cloud-download'
                },
                {
                    label: 'Icons',
                    icon: 'i-lucide-smile',
                    description: 'You have nothing to do, @nuxt/icon will handle it automatically.'
                },
                {
                    label: 'Colors',
                    icon: 'i-lucide-swatch-book',
                    description: 'Choose a primary and a neutral color from your Tailwind CSS theme.'
                },
                {
                    label: 'Theme',
                    icon: 'i-lucide-cog',
                    description: 'You can customize components by using the `class` / `ui` props or in your app.config.ts.'
                }
            ]
        },
        {
            label: 'Composables',
            icon: 'i-lucide-database',
            children: [
                {
                    label: 'defineShortcuts',
                    icon: 'i-lucide-file-text',
                    description: 'Define shortcuts for your application.',
                    to: '/composables/define-shortcuts'
                },
                {
                    label: 'useOverlay',
                    icon: 'i-lucide-file-text',
                    description: 'Display a modal/slideover within your application.',
                    to: '/composables/use-overlay'
                },
                {
                    label: 'useToast',
                    icon: 'i-lucide-file-text',
                    description: 'Display a toast within your application.',
                    to: '/composables/use-toast'
                }
            ]
        },
        {
            label: 'Components',
            icon: 'i-lucide-box',
            to: '/components',
            active: true,
            defaultOpen: true,
            children: [
                {
                    label: 'Link',
                    icon: 'i-lucide-file-text',
                    description: 'Use NuxtLink with superpowers.',
                    to: '/components/link'
                },
                {
                    label: 'Modal',
                    icon: 'i-lucide-file-text',
                    description: 'Display a modal within your application.',
                    to: '/components/modal'
                },
                {
                    label: 'NavigationMenu',
                    icon: 'i-lucide-file-text',
                    description: 'Display a list of links.',
                    to: '/components/navigation-menu'
                },
                {
                    label: 'Pagination',
                    icon: 'i-lucide-file-text',
                    description: 'Display a list of pages.',
                    to: '/components/pagination'
                },
                {
                    label: 'Popover',
                    icon: 'i-lucide-file-text',
                    description: 'Display a non-modal dialog that floats around a trigger element.',
                    to: '/components/popover'
                },
                {
                    label: 'Progress',
                    icon: 'i-lucide-file-text',
                    description: 'Show a horizontal bar to indicate task progression.',
                    to: '/components/progress'
                }
            ]
        }
    ],
    [
        {
            label: 'GitHub',
            icon: 'i-simple-icons-github',
            badge: '3.8k',
            to: 'https://github.com/nuxt/ui',
            target: '_blank'
        },
        {
            label: 'Help',
            icon: 'i-lucide-circle-help',
            disabled: true
        }
    ]
])
</script>

<template>
    <aside class="h-full flex">
        <div class="flex w-full flex-col gap-2">
            <Link
                class="flex items-center justify-start gap-5 rounded-md text-sm font-bold px-2 py-2 hover:bg-white dark:hover:bg-gray-800 hover:shadow-sm"
                :class="{
                    'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                        route().current('health.dashboard'),
                }"
                :href="route('health.dashboard')"
            >
                <UiIcon name="i-lucide-heart-pulse" class="size-5" />
                Health
            </Link>
            <Link
                class="flex items-center justify-start gap-5 rounded-md text-sm font-bold px-2 py-2 hover:bg-white dark:hover:bg-gray-800 hover:shadow-sm"
                :href="route('health.workouts.index')"
                :class="{
                    'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                        route().current('health.workouts.*'),
                }"
            >
                <UiIcon name="i-lucide-dumbbell" class="size-5" />
                Workouts
            </Link>
            <div class="ml-9 flex flex-col gap-1">
                <Link
                    class="flex items-center justify-start gap-5 rounded-md px-3 py-2 text-sm font-light text-gray-500 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-800 hover:shadow-sm"
                    :href="route('health.categories.index')"
                    :class="{
                        'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                            route().current('health.categories.*'),
                    }"
                >
                    Categories
                </Link>
                <Link
                    class="flex items-center justify-start gap-5 rounded-md px-3 py-2 text-sm font-light text-gray-500 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-800 hover:shadow-sm"
                    :href="route('health.muscle-groups.index')"
                    :class="{
                        'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                            route().current('health.muscle-groups.*'),
                    }"
                >
                    Muscle Groups
                </Link>
                <Link
                    class="flex items-center justify-start gap-5 rounded-md px-3 py-2 text-sm font-light text-gray-500 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-800 hover:shadow-sm"
                    :href="route('health.exercises.index')"
                    :class="{
                        'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                            route().current('health.exercises.*'),
                    }"
                >
                    Exercises
                </Link>
            </div>
            <Link
                class="flex items-center justify-start gap-5 rounded-md text-sm font-bold px-2 py-2 hover:bg-white dark:hover:bg-gray-800 hover:shadow-sm"
                :href="route('health.weights.index')"
                :class="{
                    'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                        route().current('health.weights.*'),
                }"
            >
                <UiIcon name="i-lucide-weight" class="size-5" />
                Weights
            </Link>
            <Link
                class="flex items-center justify-start gap-5 rounded-md text-sm font-bold px-2 py-2 hover:bg-white dark:hover:bg-gray-800 hover:shadow-sm"
                :href="route('health.oral-cares.index')"
                :class="{
                    'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                        route().current('health.oral-cares.*'),
                }"
            >
                <UiIcon name="i-lucide-ghost" class="size-5" />
                Oral Cares
            </Link>
            <div class="ml-9 flex flex-col gap-1">
                <Link
                    :href="route('health.toothpastes.index')"
                    class="flex items-center justify-start gap-5 rounded-md px-3 py-2 text-sm font-light text-gray-500 hover:bg-white dark:text-gray-400 dark:hover:bg-gray-800 hover:shadow-sm"
                    :class="{
                        'bg-white font-semibold hover:bg-gray-200 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-600 shadow-sm':
                            route().current('health.toothpastes.*'),
                    }"
                >
                    Toothpastes
                </Link>
            </div>
        </div>
    </aside>
</template>
