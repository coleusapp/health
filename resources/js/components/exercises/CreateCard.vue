<script setup lang="ts">
import Create from '@/components/exercises/Create.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="New Exercise">
                <Link :href="route('health.exercises.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Exercises</UiButton>
                </Link>
            </Header>
        </template>
        <Create />
    </UiCard>
</template>
