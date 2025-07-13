<script setup lang="ts">
import MuscleGroupTable from '@coleus/health/components/muscleGroups/Table.vue';
import { MuscleGroupCollection } from '@coleus/health/components/muscleGroups/muscleGroup';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';
import Pagination from '@coleus/support/components/table/Pagination.vue';
import MetaInformation from '@coleus/support/components/table/MetaInformation.vue';

defineProps<{
    collection: MuscleGroupCollection;
}>();
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Muscle Groups">
                <Link :href="route('health.muscle-groups.create')">
                    <UiButton icon="lucide-plus">New</UiButton>
                </Link>
            </Header>
        </template>
        <MuscleGroupTable :collection="collection" />
        <template #footer>
            <div class="flex items-center justify-between">
                <MetaInformation :meta="collection.meta" />
                <Pagination :meta="collection.meta" />
            </div>
        </template>
    </UiCard>
</template>
