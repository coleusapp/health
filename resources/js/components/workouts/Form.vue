<script setup lang="ts">
import { OptionCollection } from '@/types';
import { ExerciseCollection, exerciseCollectionKey } from '@/components/exercises/exercise';
import { calorieUnitsKey, distanceUnitsKey, durationUnitsKey, weightUnitsKey, WorkoutData } from '@/components/workouts/workout';
import { FormKit } from '@formkit/vue';
import { cloneDeep, find, memoize } from 'lodash';
import { inject } from 'vue';

const exercises = inject(exerciseCollectionKey) as ExerciseCollection;
const weightUnits = inject(weightUnitsKey) as OptionCollection;
const distanceUnits = inject(distanceUnitsKey) as OptionCollection;
const durationUnits = inject(durationUnitsKey) as OptionCollection;
const calorieUnits = inject(calorieUnitsKey) as OptionCollection;

defineProps<{
    value: Omit<WorkoutData, 'id'>;
}>();

const getExercise = memoize((exerciseId: number) => {
    return find(exercises.data, (item) => [item?.value].includes(exerciseId));
});
</script>
<template>
    <FormKit type="datetime-local" name="date" label="Date" validation="required" />
    <FormKit type="repeater" name="exercises" label="Exercises" validation="required" :min="0">
        <template #default="{ value }">
            <FormKit type="select" label="Exercise" name="id" :options="cloneDeep(exercises.data)" />
            <template v-if="getExercise(value.id)?.has_rep">
                <FormKit type="number" min="0" label="Reps" name="reps" />
            </template>
            <div v-if="getExercise(value.id)?.has_weight" class="grid grid-cols-2 gap-2">
                <FormKit type="number" min="0" label="Weight" name="weight" />
                <FormKit
                    type="select"
                    name="weight_unit"
                    label="Weight Unit"
                    :options="weightUnits?.data"
                    key="weight_unit"
                    validation="required"
                    :value="value?.weight_unit || getExercise(value.id)?.weight_unit || null"
                />
            </div>
            <div v-if="getExercise(value.id)?.has_distance" class="grid grid-cols-2 gap-2">
                <FormKit type="number" min="0" label="Distance" name="distance" step="0.01" />
                <FormKit
                    type="select"
                    name="distance_unit"
                    label="Distance Unit"
                    :options="distanceUnits?.data"
                    key="distance_unit"
                    validation="required"
                    :value="value?.distance_unit || getExercise(value.id)?.distance_unit || null"
                />
            </div>
            <div v-if="getExercise(value.id)?.has_duration" class="grid grid-cols-2 gap-2">
                <FormKit type="number" min="0" label="Duration" name="duration" />
                <FormKit
                    type="select"
                    name="duration_unit"
                    label="Duration Unit"
                    :options="durationUnits?.data"
                    key="duration_unit"
                    validation="required"
                    :value="value?.duration_unit || getExercise(value.id)?.duration_unit || null"
                />
            </div>
            <div v-if="getExercise(value.id)?.has_calorie" class="grid grid-cols-2 gap-2">
                <FormKit type="number" min="0" label="Calorie" name="calorie" />
                <FormKit
                    type="select"
                    name="calorie_unit"
                    label="Calorie Unit"
                    :options="calorieUnits?.data"
                    key="calorie_unit"
                    validation="required"
                    :value="value?.calorie_unit || getExercise(value.id)?.calorie_unit || null"
                />
            </div>
        </template>
    </FormKit>
</template>
