<script setup lang="ts">
import { OptionCollection } from '@/types';
import EditExercise from '@coleus/health/components/exercises/Edit.vue';
import {
    categoriesKey,
    distanceUnitsKey,
    durationUnitsKey,
    ExerciseResource,
    muscleGroupsKey,
    exerciseResourceKey,
    weightUnitsKey,
} from '@coleus/health/components/exercises/exercise';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: ExerciseResource;
    weight_units: OptionCollection;
    distance_units: OptionCollection;
    duration_units: OptionCollection;
    muscle_groups: OptionCollection;
    categories: OptionCollection;
}>();
provide(exerciseResourceKey, props.resource);
provide(weightUnitsKey, props.weight_units);
provide(distanceUnitsKey, props.distance_units);
provide(durationUnitsKey, props.duration_units);
provide(muscleGroupsKey, props.muscle_groups);
provide(categoriesKey, props.categories);
</script>

<template>
    <HealthLayout>
        <EditExercise />
    </HealthLayout>
</template>
