<script setup lang="ts">
import MuscleGroupCard from '@coleus/health/components/muscleGroups/EditCard.vue';
import {
    MuscleGroupCollection,
    MuscleGroupResource,
    muscleGroupResourceKey,
    muscleGroupsKey,
} from '@coleus/health/components/muscleGroups/muscleGroup';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: MuscleGroupResource;
    muscle_groups: MuscleGroupCollection;
}>();
provide(muscleGroupResourceKey, props.resource);
provide(muscleGroupsKey, props.muscle_groups);
</script>

<template>
    <HealthLayout>
        <MuscleGroupCard />
    </HealthLayout>
</template>
