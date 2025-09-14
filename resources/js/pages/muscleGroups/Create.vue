<script setup lang="ts">
import CreateCard from '@/components/muscleGroups/CreateCard.vue';
import { MuscleGroupCollection, muscleGroupsKey } from '@/components/muscleGroups/muscleGroup';
import HealthLayout from '@/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    muscle_groups: MuscleGroupCollection;
}>();
provide(muscleGroupsKey, props.muscle_groups);
</script>

<template>
    <HealthLayout>
        <CreateCard />
    </HealthLayout>
</template>
