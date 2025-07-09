<script setup lang="ts">
import EditWeight from '@coleus/health/components/weights/Edit.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Update Weight">
                <Link :href="route('health.weights.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Weights</UiButton>
                </Link>
            </Header>
        </template>
        <EditWeight />
    </UiCard>
</template>
