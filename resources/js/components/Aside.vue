<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <aside class="flex h-full">
        <div class="flex w-full flex-col">
            <Link
                class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100 dark:hover:bg-gray-800"
                :class="{
                    'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-white font-semibold hover:bg-gray-200 dark:hover:bg-gray-600': route().current('health.dashboard'),
                }"
                :href="route('health.dashboard')"
            >
                <UiIcon name="i-lucide-heart-pulse" class="size-5" />
                Health
            </Link>
            <Link
                class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100 dark:hover:bg-gray-800"
                :href="route('health.workouts.index')"
                :class="{
                    'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-white font-semibold hover:bg-gray-200 dark:hover:bg-gray-600': route().current('health.workouts.*'),
                }"
            >
                <UiIcon name="i-lucide-dumbbell" class="size-5" />
                Workouts
            </Link>
            <div class="flex flex-col ml-5 pl-6 border-l border-gray-300 dark:border-gray-700">
                <Link
                    class="flex items-center justify-start gap-5 rounded-md p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    :href="route('health.categories.index')"
                    :class="{
                        'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-white font-semibold hover:bg-gray-200 dark:hover:bg-gray-600': route().current('health.categories.*'),
                    }"
                >
                    Categories
                </Link>
                <Link
                    class="flex items-center justify-start gap-5 rounded-md p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    :href="route('health.muscle-groups.index')"
                    :class="{
                        'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-white font-semibold hover:bg-gray-200 dark:hover:bg-gray-600': route().current('health.muscle-groups.*'),
                    }"
                >
                    Muscle Groups
                </Link>
                <Link
                    class="flex items-center justify-start gap-5 rounded-md p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    :href="route('health.exercises.index')"
                    :class="{
                        'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-white font-semibold hover:bg-gray-200 dark:hover:bg-gray-600': route().current('health.exercises.*'),
                    }"
                >
                    Exercises
                </Link>
            </div>
            <Link
                class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100 dark:hover:bg-gray-800"
                :href="route('health.weights.index')"
                :class="{
                    'bg-gray-100 dark:bg-gray-800 text-gray-500 dark:text-white font-semibold hover:bg-gray-200 dark:hover:bg-gray-600': route().current('health.weights.*'),
                }"
            >
                <UiIcon name="i-lucide-weight" class="size-5" />
                Weights
            </Link>
            <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100 dark:hover:bg-gray-800">
                <UiIcon name="i-lucide-ghost" class="size-5" />
                Oral Cares
            </Link>
            <div class="flex flex-col ml-5 pl-6 border-l border-gray-300 dark:border-gray-700">
                <Link class="flex items-center justify-start gap-5 rounded-md p-2 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800">
                    Toothpaste Types
                </Link>
            </div>
            <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100 dark:hover:bg-gray-800">
                <UiIcon name="i-lucide-cog" class="size-5" />
                Settings
            </Link>
        </div>
    </aside>
</template>
