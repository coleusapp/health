<script setup lang="ts">
import AppLayout from '@coleus/support/layouts/AppLayout.vue';

defineOptions({ inheritAttrs: false });
</script>

<template>
    <AppLayout title="Health">
        <div class="w-full 2xl:max-w-5xl" :class="$attrs.class">
            <slot />
        </div>
    </AppLayout>
</template>
