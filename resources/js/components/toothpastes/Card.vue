<script setup lang="ts">
import ToothpasteTable from '@/components/toothpastes/Table.vue';
import { ToothpasteCollection } from '@/components/toothpastes/Toothpaste';
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
