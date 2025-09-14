<script setup lang="ts">
import ExerciseTable from '@/components/exercises/Table.vue';
import type { ExerciseCollection } from '@/components/exercises/exercise';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';
import MetaInformation from '@coleus/support/components/table/MetaInformation.vue';
import Pagination from '@coleus/support/components/table/Pagination.vue';

defineProps<{
    collection: ExerciseCollection;
}>();
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="exercises">
                <Link :href="route('health.exercises.create')">
                    <UiButton icon="lucide-plus">New</UiButton>
                </Link>
            </Header>
        </template>
        <ExerciseTable :collection="collection" />
        <template #footer>
            <div class="flex items-center justify-between">
                <MetaInformation :meta="collection.meta" />
                <Pagination :meta="collection.meta" />
            </div>
        </template>
    </UiCard>
</template>
