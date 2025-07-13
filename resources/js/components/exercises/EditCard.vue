<script setup lang="ts">
import Edit from '@coleus/health/components/exercises/Edit.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Update Exercise">
                <Link :href="route('health.exercises.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Exercises</UiButton>
                </Link>
            </Header>
        </template>
        <Edit />
    </UiCard>
</template>
