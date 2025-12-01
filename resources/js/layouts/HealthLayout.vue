<script setup lang="ts">
import AppLayout from '@coleus/support/layouts/AppLayout.vue';
</script>

<template>
    <AppLayout title="Health">
        <div class="max-w-5xl w-full">
            <slot />
        </div>
    </AppLayout>
</template>
