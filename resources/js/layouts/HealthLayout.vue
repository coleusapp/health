<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>
        <template #header>Health</template>
        <template #name>Health</template>
        <div class="flex h-full gap-4">
            <aside class="flex h-full w-full max-w-64 rounded-xl bg-gray-50 p-2">
                <div class="flex w-full flex-col">
                    <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.dashboard')">
                        <UiIcon name="i-lucide-house" class="size-5" />
                        Dashboard
                    </Link>
                    <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.dashboard')">
                        <UiIcon name="i-lucide-dumbbell" class="size-5" />
                        Workouts
                    </Link>
                    <div class="flex flex-col ml-5 pl-6 border-l border-gray-300">
                        <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.dashboard')">
                            Categories
                        </Link>
                        <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.dashboard')">
                            Muscle Groups
                        </Link>
                        <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.dashboard')">
                            Exercises
                        </Link>
                    </div>
                    <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.dashboard')">
                        <UiIcon name="i-lucide-weight" class="size-5" />
                        Weights
                    </Link>
                    <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.dashboard')">
                        <UiIcon name="i-lucide-ghost" class="size-5" />
                        Oral Cares
                    </Link>
                    <div class="flex flex-col ml-5 pl-6 border-l border-gray-300">
                        <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.dashboard')">
                            Toothpaste Types
                        </Link>
                    </div>
                    <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.dashboard')">
                        <UiIcon name="i-lucide-cog" class="size-5" />
                        Settings
                    </Link>
                </div>
            </aside>
            <div class="w-full">
                <!--<div class="w-full bg-gray-50 p-2 rounded"></div>-->
                <slot />
            </div>
        </div>
    </AppLayout>
</template>
