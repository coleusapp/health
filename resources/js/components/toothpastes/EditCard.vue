<script setup lang="ts">
import EditToothpaste from '@/components/toothpastes/Edit.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Update Toothpaste">
                <Link :href="route('health.toothpastes.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Toothpastes</UiButton>
                </Link>
            </Header>
        </template>
        <EditToothpaste />
    </UiCard>
</template>
