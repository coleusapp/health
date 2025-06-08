<script setup lang="ts">
import WeightTable from '@coleus/health/components/toothpasteTypes/Table.vue';
import { Collection } from '@coleus/health/components/toothpasteTypes/type';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: Collection;
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
        <WeightTable :collection="collection" />
    </UiCard>
</template>
