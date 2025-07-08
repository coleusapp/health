<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <AppLayout>
        <!--<template #header>Health</template>-->
        <template #name>Health</template>
        <div class="flex items-center justify-between gap-5 border-b border-b-zinc-200 p-2 text-sm">
            <div class="w-full flex items-center gap-3">
                <!--<UiButton icon="i-lucide-x" size="xs" variant="ghost" color="neutral" class="rounded-full"></UiButton>-->
                <!--<UiButton icon="i-lucide-minus" size="xs" variant="ghost" color="neutral" class="rounded-full"></UiButton>-->
                <UiDrawer direction="left" :overlay="false" :handle="false">
                    <UiButton color="neutral" size="lg" variant="ghost" icon="i-lucide-menu" class="rounded-full" />
                    <template #content>
                        <aside class="flex h-full min-w-64 p-2">
                            <div class="flex w-full flex-col">
                                <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.dashboard')">
                                    <UiIcon name="i-lucide-house" class="size-5" />
                                    Dashboard
                                </Link>
                                <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.workouts.index')">
                                    <UiIcon name="i-lucide-dumbbell" class="size-5" />
                                    Workouts
                                </Link>
                                <div class="flex flex-col ml-5 pl-6 border-l border-gray-300">
                                    <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.categories.index')">
                                        Categories
                                    </Link>
                                    <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.muscle-groups.index')">
                                        Muscle Groups
                                    </Link>
                                    <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.exercises.index')">
                                        Exercises
                                    </Link>
                                </div>
                                <Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.weights.index')">
                                    <UiIcon name="i-lucide-weight" class="size-5" />
                                    Weights
                                </Link>
                                <!--<Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.oral-cares.index')">-->
                                <!--    <UiIcon name="i-lucide-ghost" class="size-5" />-->
                                <!--    Oral Cares-->
                                <!--</Link>-->
                                <!--<div class="flex flex-col ml-5 pl-6 border-l border-gray-300">-->
                                <!--    <Link class="flex items-center justify-start gap-5 rounded-md p-2 hover:bg-gray-100" :href="route('health.toothpastes.index')">-->
                                <!--        Toothpaste Types-->
                                <!--    </Link>-->
                                <!--</div>-->
                                <!--<Link class="flex items-center justify-start gap-5 rounded-md p-3 hover:bg-gray-100" :href="route('health.settings')">-->
                                <!--    <UiIcon name="i-lucide-cog" class="size-5" />-->
                                <!--    Settings-->
                                <!--</Link>-->
                            </div>
                        </aside>
                    </template>
                </UiDrawer>
                <Link :href="route('health.dashboard')">
                    <UiButton color="neutral" size="lg" variant="ghost" icon="i-lucide-apple" class="rounded-full" label="Health" />
                </Link>
            </div>
        </div>
        <div class="flex h-full p-4">
            <div class="w-full">
                <!--<div class="w-full bg-gray-50 p-2 rounded"></div>-->
                <slot />
            </div>
        </div>
    </AppLayout>
</template>
