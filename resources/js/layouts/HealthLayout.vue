<script setup lang="ts">
import AppLayout from '@coleus/support/layouts/AppLayout.vue';
import Aside from '@/components/Aside.vue';
</script>

<template>
    <AppLayout>
        <Aside />
        <div class="flex w-full flex-col-reverse md:flex-row">
            <div class="w-full h-full p-4 overflow-scroll">
                <div class="w-full max-w-7xl mx-auto ">
                    <slot />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
