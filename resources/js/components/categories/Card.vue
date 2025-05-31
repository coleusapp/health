<script setup lang="ts">
import CategoryTable from '@health/components/categories/Table.vue';
import { CategoryCollection } from '@health/components/categories/category';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: CategoryCollection;
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
        <CategoryTable :collection="collection" />
    </UiCard>
</template>
