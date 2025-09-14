<script setup lang="ts">
import AppLayout from '@coleus/support/layouts/AppLayout.vue';
import Aside from '@/components/Aside.vue';
</script>

<template>
    <AppLayout>
        <div class="flex w-full">
            <div class="min-w-60 py-2 pl-2 pr-1">
                <Aside />
            </div>
            <div class="w-full h-[calc(100vh-1rem)] bg-white dark:bg-gray-950 m-2 rounded-lg border border-gray-200 dark:border-gray-700 py-8 px-4">
                <div class="w-full max-w-7xl mx-auto">
                    <slot />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
