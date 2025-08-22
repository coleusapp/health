<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import Aside from '@coleus/health/components/Aside.vue';
</script>

<template>
    <AppLayout>
        <div class="flex w-full">
            <div class="min-w-60 py-2 pl-2 pr-1">
                <Aside />
            </div>
            <div class="w-full h-[calc(100vh-1rem)] bg-white m-2 rounded-lg border border-gray-200 py-8 px-4">
                <div class="w-full max-w-7xl mx-auto">
                    <slot />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
