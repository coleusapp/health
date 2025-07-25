<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import Aside from '@coleus/health/components/Aside.vue';
</script>

<template>
    <AppLayout>
        <div class="flex w-full">
            <div class="min-w-64 py-2 pl-2 pr-1">
                <Aside />
            </div>
            <div class="w-full py-2 pl-1 pr-2">
                <slot />
            </div>
        </div>
    </AppLayout>
</template>
