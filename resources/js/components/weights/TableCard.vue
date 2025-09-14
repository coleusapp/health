<script setup lang="ts">
import WeightTable from '@/components/weights/Table.vue';
import { WeightCollection } from '@/components/weights/weight';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';
import MetaInformation from '@coleus/support/components/table/MetaInformation.vue';
import Pagination from '@coleus/support/components/table/Pagination.vue';

defineProps<{
    collection: WeightCollection;
}>();
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="weights">
                <Link :href="route('health.weights.create')">
                    <UiButton icon="lucide-plus">New</UiButton>
                </Link>
            </Header>
        </template>
        <WeightTable :collection="collection" />
        <template #footer>
            <div class="flex items-center justify-between">
                <MetaInformation :meta="collection.meta" />
                <Pagination :meta="collection.meta" />
            </div>
        </template>
    </UiCard>
</template>
