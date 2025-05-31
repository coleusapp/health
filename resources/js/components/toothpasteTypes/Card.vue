<script setup lang="ts">
import WeightTable from '@health/components/toothpasteTypes/Table.vue';
import { Collection } from '@health/components/toothpasteTypes/type';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: Collection;
}>();
</script>
<template>
    <UiCard>
        <template #header>
            Categories
            <Link :href="route('health.workouts.categories.create')">
                <UiButton icon="lucide-plus">New</UiButton>
            </Link>
        </template>
        <WeightTable :collection="collection" />
    </UiCard>
</template>
