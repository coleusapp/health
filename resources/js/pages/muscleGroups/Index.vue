<script setup lang="ts">
import MuscleGroupCard from '@coleus/health/components/muscleGroups/TableCard.vue';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { MuscleGroupCollection } from '@coleus/health/components/muscleGroups/muscleGroup';

defineProps<{
    collection: MuscleGroupCollection;
}>();
</script>

<template>
    <HealthLayout>
        <MuscleGroupCard :collection="collection" />
    </HealthLayout>
</template>
