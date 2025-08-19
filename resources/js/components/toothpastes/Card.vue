<script setup lang="ts">
import ToothpasteTable from '@coleus/health/components/toothpastes/Table.vue';
import { ToothpasteCollection } from '@coleus/health/components/toothpastes/Toothpaste';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: ToothpasteCollection;
}>();
</script>
<template>
    <UiCard>
        <template #header>
            Toothpastes
            <Link :href="route('health.toothpastes.create')">
                <UiButton icon="lucide-plus">New</UiButton>
            </Link>
        </template>
        <ToothpasteTable :collection="collection" />
    </UiCard>
</template>
