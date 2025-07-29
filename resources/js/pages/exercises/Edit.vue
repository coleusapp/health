<script setup lang="ts">
import { OptionCollection } from '@/types';
import EditCard from '@coleus/health/components/exercises/EditCard.vue';
import {
    calorieUnitsKey,
    categoriesKey,
    distanceUnitsKey,
    durationUnitsKey,
    ExerciseResource,
    exerciseResourceKey,
    muscleGroupsKey,
    weightUnitsKey,
} from '@coleus/health/components/exercises/exercise';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: ExerciseResource;
    weight_units: OptionCollection;
    distance_units: OptionCollection;
    duration_units: OptionCollection;
    calorie_units: OptionCollection;
    muscle_groups: OptionCollection;
    categories: OptionCollection;
}>();
provide(exerciseResourceKey, props.resource);
provide(weightUnitsKey, props.weight_units);
provide(distanceUnitsKey, props.distance_units);
provide(durationUnitsKey, props.duration_units);
provide(calorieUnitsKey, props.calorie_units);
provide(muscleGroupsKey, props.muscle_groups);
provide(categoriesKey, props.categories);
</script>

<template>
    <HealthLayout>
        <EditCard />
    </HealthLayout>
</template>
