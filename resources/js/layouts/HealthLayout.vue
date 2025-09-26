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
            <div class="w-full min-h-screen h-full p-4 overflow-scroll">
                <div class="w-full max-w-7xl mx-auto ">
                    <slot />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
