<script setup lang="ts">
import EditOralCare from '@coleus/health/components/oralCares/Edit.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Update Category">
                <Link :href="route('health.oral-cares.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Oral Cares</UiButton>
                </Link>
            </Header>
        </template>
        <EditOralCare />
    </UiCard>
</template>
