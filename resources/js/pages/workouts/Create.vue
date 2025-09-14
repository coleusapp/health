<script setup lang="ts">
import { OptionCollection } from '@/types';
import { ExerciseCollection, exerciseCollectionKey } from '@/components/exercises/exercise';
import CreateCard from '@/components/workouts/CreateCard.vue';
import {
    calorieUnitsKey,
    distanceUnitsKey,
    durationUnitsKey,
    weightUnitsKey,
    WorkoutResource,
    workoutResourceKey,
} from '@/components/workouts/workout';
import HealthLayout from '@/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    resource: WorkoutResource;
    exercises: ExerciseCollection;
    weight_units: OptionCollection;
    distance_units: OptionCollection;
    duration_units: OptionCollection;
    calorie_units: OptionCollection;
}>();
provide(workoutResourceKey, props.resource);
provide(exerciseCollectionKey, props.exercises);
provide(weightUnitsKey, props.weight_units);
provide(distanceUnitsKey, props.distance_units);
provide(durationUnitsKey, props.duration_units);
provide(calorieUnitsKey, props.calorie_units);
</script>

<template>
    <HealthLayout>
        <CreateCard />
    </HealthLayout>
</template>
