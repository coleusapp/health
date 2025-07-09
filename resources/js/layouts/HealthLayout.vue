<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Aside from '@coleus/health/components/Aside.vue';
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
                        <Aside />
                    </template>
                </UiDrawer>
                <Link :href="route('health.dashboard')">
                    <UiButton color="neutral" size="lg" variant="ghost" icon="i-lucide-apple" class="rounded-full" label="Health" />
                </Link>
            </div>
        </div>
        <div class="flex h-full p-4">
            <div class="w-full">
                <!--<Aside />-->
                <slot />
            </div>
        </div>
    </AppLayout>
</template>
