<script setup lang="ts">
import WorkoutTable from '@health/components/workouts/Table.vue';
import { WorkoutCollection } from '@health/components/workouts/workout';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: WorkoutCollection;
}>();
</script>
<template>
    <UiCard>
        <template #header>
            Workouts
            <Link :href="route('health.workouts.create')">
                <UiButton icon="lucide-plus">New</UiButton>
            </Link>
        </template>
        <WorkoutTable :collection="collection" />
    </UiCard>
</template>
