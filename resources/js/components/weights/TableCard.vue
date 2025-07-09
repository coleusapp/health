<script setup lang="ts">
import WeightTable from '@coleus/health/components/weights/Table.vue';
import { WeightCollection } from '@coleus/health/components/weights/weight';
import Header from '@coleus/support/components/card/Header.vue';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: WeightCollection;
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
    </UiCard>
</template>
