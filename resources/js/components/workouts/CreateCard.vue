<script setup lang="ts">
import CreateWorkout from '@coleus/health/components/workouts/Create.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="New Workout">
                <Link :href="route('health.workouts.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Workouts</UiButton>
                </Link>
            </Header>
        </template>
        <CreateWorkout />
    </UiCard>
</template>
