<script setup lang="ts">
import { OptionCollection } from '@/types';
import {
    ExerciseRequest,
    categoriesKey,
    distanceUnitsKey,
    durationUnitsKey,
    muscleGroupsKey,
    weightUnitsKey,
} from '@coleus/health/components/exercises/exercise';
import { FormKit } from '@formkit/vue';
import { inject } from 'vue';

defineProps<{
    value: ExerciseRequest;
}>();
const weightUnits = inject(weightUnitsKey) as OptionCollection;
const distanceUnits = inject(distanceUnitsKey) as OptionCollection;
const durationUnits = inject(durationUnitsKey) as OptionCollection;
const muscleGroups = inject(muscleGroupsKey) as OptionCollection;
const categories = inject(categoriesKey) as OptionCollection;
</script>

<template>
    <FormKit type="text" name="name" label="Name" validation="required" />
    <div class="grid grid-cols-2 gap-4">
        <FormKit name="muscle_groups" type="repeater" label="Muscle Groups" add-label="+ Add Muscle Group" :min="0" :max="muscleGroups?.data.length">
            <FormKit type="select" name="id" label="Muscle group" :options="muscleGroups?.data" />
        </FormKit>
        <FormKit name="categories" type="repeater" label="Categories" add-label="+ Add Category" :min="0" :max="categories?.data.length">
            <FormKit type="select" name="id" label="Category" :options="categories?.data" />
        </FormKit>
    </div>
    <FormKit type="textarea" name="description" label="Description" />
    <div class="grid grid-cols-2 gap-x-4">
        <FormKit type="checkbox" name="has_rep" label="Has Rep" />
        <FormKit type="checkbox" name="has_calorie" label="Has Calorie" />

        <div class="flex flex-col">
            <FormKit type="checkbox" name="has_weight" label="Has Weight" />
            <FormKit v-if="value?.has_weight" type="select" name="weight_unit" label="Default Weight Unit" :options="weightUnits?.data" key="weight_unit" />
        </div>
        <div class="flex flex-col">
            <FormKit type="checkbox" name="has_distance" label="Has Distance" />
            <FormKit
                v-if="value?.has_distance"
                type="select"
                name="distance_unit"
                label="Default Distance Unit"
                :options="distanceUnits?.data"
                key="distance_unit"
            />
        </div>
        <div class="flex flex-col">
            <FormKit type="checkbox" name="has_duration" label="Has Duration" />
            <FormKit
                v-if="value?.has_duration"
                type="select"
                name="duration_unit"
                label="Default Duration Unit"
                :options="durationUnits?.data"
                key="duration_unit"
            />
        </div>
    </div>
</template>
