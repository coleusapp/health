<script setup lang="ts">
import MuscleGroupCard from '@/components/muscleGroups/EditCard.vue';
import {
    MuscleGroupCollection,
    MuscleGroupResource,
    muscleGroupResourceKey,
    muscleGroupsKey,
} from '@/components/muscleGroups/muscleGroup';
import HealthLayout from '@/layouts/HealthLayout.vue';
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
