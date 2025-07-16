<script setup lang="ts">
import EditWorkout from '@coleus/health/components/workouts/Edit.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Update Workout">
                <Link :href="route('health.workouts.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Workouts</UiButton>
                </Link>
            </Header>
        </template>
        <EditWorkout />
    </UiCard>
</template>
