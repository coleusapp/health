<script setup lang="ts">
import CreateWeight from '@/components/weights/Create.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="New Weight">
                <Link :href="route('health.weights.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Weights</UiButton>
                </Link>
            </Header>
        </template>
        <CreateWeight />
    </UiCard>
</template>
