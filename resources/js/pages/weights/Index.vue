<script setup lang="ts">
import WeightTable from '@coleus/health/components/weights/Table.vue';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { WeightCollection } from '@coleus/health/components/weights/weight';
import { Link } from '@inertiajs/vue3';

defineProps<{
    collection?: WeightCollection;
}>();
</script>

<template>
    <HealthLayout>
        <div class="flex items-center justify-end">
            <Link :href="route('health.weights.create')">
                <UiButton icon="lucide-plus">New</UiButton>
            </Link>
        </div>
        <WeightTable :collection="collection" />
    </HealthLayout>
</template>
