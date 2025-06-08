<script setup lang="ts">
import CategoryTable from '@coleus/health/components/categories/Table.vue';
import { CategoryCollection } from '@coleus/health/components/categories/category';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: CategoryCollection;
}>();
</script>
<template>
    <UiCard>
        <template #header>
            Categories
            <Link :href="route('health.categories.create')">
                <UiButton icon="lucide-plus">New</UiButton>
            </Link>
        </template>
        <CategoryTable :collection="collection" />
    </UiCard>
</template>
