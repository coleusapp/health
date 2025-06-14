<script setup lang="ts">
import MuscleGroupCreate from '@coleus/health/components/muscleGroups/Create.vue';
import { MuscleGroupCollection, muscleGroupsKey } from '@coleus/health/components/muscleGroups/muscleGroup';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    muscle_groups: MuscleGroupCollection;
}>();
provide(muscleGroupsKey, props.muscle_groups);
</script>

<template>
    <HealthLayout>
        <MuscleGroupCreate />
    </HealthLayout>
</template>
