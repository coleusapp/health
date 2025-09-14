<script setup lang="ts">
import ToothpasteTable from '@/components/toothpastes/Table.vue';
import { ToothpasteCollection } from '@/components/toothpastes/Toothpaste';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';
import Pagination from '@coleus/support/components/table/Pagination.vue';
import MetaInformation from '@coleus/support/components/table/MetaInformation.vue';

defineProps<{
    collection: ToothpasteCollection;
}>();
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Toothpastes">
                <Link :href="route('health.toothpastes.create')">
                    <UiButton icon="lucide-plus">New</UiButton>
                </Link>
            </Header>
        </template>
        <ToothpasteTable :collection="collection" />
        <template #footer>
            <div class="flex items-center justify-between">
                <MetaInformation :meta="collection.meta" />
                <Pagination :meta="collection.meta" />
            </div>
        </template>
    </UiCard>
</template>
