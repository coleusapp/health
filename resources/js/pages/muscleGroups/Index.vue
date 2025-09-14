<script setup lang="ts">
import MuscleGroupCard from '@/components/muscleGroups/TableCard.vue';
import HealthLayout from '@/layouts/HealthLayout.vue';
import { MuscleGroupCollection } from '@/components/muscleGroups/muscleGroup';

defineProps<{
    collection: MuscleGroupCollection;
}>();
</script>

<template>
    <HealthLayout>
        <MuscleGroupCard :collection="collection" />
    </HealthLayout>
</template>
