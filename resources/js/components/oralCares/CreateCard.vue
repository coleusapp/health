<script setup lang="ts">
import CreateOralCare from '@/components/oralCares/Create.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="New Oral Care">
                <Link :href="route('health.oral-cares.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Oral Cares</UiButton>
                </Link>
            </Header>
        </template>
        <CreateOralCare />
    </UiCard>
</template>
