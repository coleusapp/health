<script setup lang="ts">
import { inject } from 'vue';
import { MuscleGroupCollection, muscleGroupsKey } from './muscleGroup';

const muscleGroups = inject(muscleGroupsKey) as MuscleGroupCollection;
</script>

<template>
    <FormKit type="text" name="name" label="Name" validation="required" />
    <FormKit type="textarea" name="description" label="description" />
    <FormKit type="select" name="muscle_group_id" label="Muscle Group" :options="muscleGroups?.data || []" />
</template>
