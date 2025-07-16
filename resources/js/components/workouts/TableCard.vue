<script setup lang="ts">
import WorkoutTable from '@coleus/health/components/workouts/Table.vue';
import { WorkoutCollection } from '@coleus/health/components/workouts/workout';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';
import MetaInformation from '@coleus/support/components/table/MetaInformation.vue';
import Pagination from '@coleus/support/components/table/Pagination.vue';

defineProps<{
    collection: WorkoutCollection;
}>();
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="workouts">
                <Link :href="route('health.workouts.create')">
                    <UiButton icon="lucide-plus">New</UiButton>
                </Link>
            </Header>
        </template>
        <WorkoutTable :collection="collection" />
        <template #footer>
            <div class="flex items-center justify-between">
                <MetaInformation :meta="collection.meta" />
                <Pagination :meta="collection.meta" />
            </div>
        </template>
    </UiCard>
</template>
