<script setup lang="ts">
import CreateMuscleGroup from '@coleus/health/components/muscleGroups/Create.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="New Muscle Group">
                <Link :href="route('health.muscle-groups.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Muscle Groups</UiButton>
                </Link>
            </Header>
        </template>
        <CreateMuscleGroup />
    </UiCard>
</template>
