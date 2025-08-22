<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <aside class="flex h-full">
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
            <Link class="flex items-center justify-start gap-5 rounded-md text-sm font-bold px-2 py-2 hover:bg-white dark:hover:bg-gray-800 hover:shadow-sm">
                <UiIcon name="i-lucide-cog" class="size-5" />
                Settings
            </Link>
        </div>
    </aside>
</template>
