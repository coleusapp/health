<script setup lang="ts">
import { OptionCollection } from '@/types';
import CreateCard from '@/components/exercises/CreateCard.vue';
import {
    calorieUnitsKey,
    categoriesKey,
    distanceUnitsKey,
    durationUnitsKey,
    muscleGroupsKey,
    weightUnitsKey,
} from '@/components/exercises/exercise';
import HealthLayout from '@/layouts/HealthLayout.vue';
import { provide } from 'vue';

const props = defineProps<{
    weight_units: OptionCollection;
    distance_units: OptionCollection;
    duration_units: OptionCollection;
    calorie_units: OptionCollection;
    muscle_groups: OptionCollection;
    categories: OptionCollection;
}>();
provide(weightUnitsKey, props.weight_units);
provide(distanceUnitsKey, props.distance_units);
provide(durationUnitsKey, props.duration_units);
provide(calorieUnitsKey, props.calorie_units);
provide(muscleGroupsKey, props.muscle_groups);
provide(categoriesKey, props.categories);
</script>

<template>
    <HealthLayout>
        <CreateCard />
    </HealthLayout>
</template>
