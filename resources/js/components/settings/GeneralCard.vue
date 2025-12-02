<script setup lang="ts">
import General from '@/components/settings/General.vue';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="General Settings" />
        </template>
        <General />
    </UiCard>
</template>
