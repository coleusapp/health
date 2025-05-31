<script setup lang="ts">
import ExerciseTable from '@health/components/exercises/Table.vue';
import { Collection } from '@health/components/exercises/type';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: Collection;
}>();
</script>
<template>
    <UiCard>
        <template #header>
            Exercises
            <Link :href="route('health.workouts.exercises.create')">
                <UiButton icon="lucide-plus">New</UiButton>
            </Link>
        </template>
        <ExerciseTable :collection="collection" />
    </UiCard>
</template>
