<script setup lang="ts">
import CategoryTable from '@/components/categories/Table.vue';
import { CategoryCollection } from '@/components/categories/category';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: CategoryCollection;
}>();
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="categories">
                <Link :href="route('health.categories.create')">
                    <UiButton icon="lucide-plus">New</UiButton>
                </Link>
            </Header>
        </template>
        <CategoryTable :collection="collection" />
    </UiCard>
</template>
