<script setup lang="ts">
import EditMuscleGroup from '@/components/muscleGroups/Edit.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Update Category">
                <Link :href="route('health.muscle-groups.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Muscle Groups</UiButton>
                </Link>
            </Header>
        </template>
        <EditMuscleGroup />
    </UiCard>
</template>
