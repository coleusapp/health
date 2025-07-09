<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
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
            <div class="ml-5 flex flex-col border-l border-gray-300 pl-6">
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
