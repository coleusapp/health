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
            <div class="flex flex-col md:flex-row items-end justify-between gap-3">
                <FormKit type="select" label="Exercise" name="id" :options="cloneDeep(exercises.data)" outer-class="!mb-0 w-full md:flex-1" wrapper-class="!mb-0" />
                <template v-if="getExercise(value.id)?.has_rep">
                    <FormKit type="number" min="0" label="Reps" name="reps" outer-class="!mb-0 w-full md:flex-1" wrapper-class="!mb-0" />
                </template>
                <div v-if="getExercise(value.id)?.has_weight" class="w-full md:w-auto md:flex-1 flex items-end gap-3">
                    <FormKit type="number" min="0" label="Weight" name="weight" outer-class="!mb-0 w-2/3 md:w-full md:flex-1" wrapper-class="!mb-0" />
                    <FormKit
                        type="select"
                        name="weight_unit"
                        label="Weight Unit"
                        :options="weightUnits?.data"
                        key="weight_unit"
                        validation="required"
                        :value="value?.weight_unit || getExercise(value.id)?.weight_unit || null"
                        outer-class="!mb-0 w-1/3 md:w-full md:flex-1"
                        wrapper-class="!mb-0"
                    />
                </div>
                <div v-if="getExercise(value.id)?.has_distance" class="w-full md:w-auto md:flex-1 flex items-end gap-3">
                    <FormKit type="number" min="0" label="Distance" name="distance" step="0.01" outer-class="!mb-0 w-2/3 md:flex-1" wrapper-class="!mb-0" />
                    <FormKit
                        type="select"
                        name="distance_unit"
                        label="Distance Unit"
                        :options="distanceUnits?.data"
                        key="distance_unit"
                        validation="required"
                        :value="value?.distance_unit || getExercise(value.id)?.distance_unit || null"
                        outer-class="!mb-0 w-1/3 md:flex-1"
                        wrapper-class="!mb-0"
                    />
                </div>
                <div v-if="getExercise(value.id)?.has_duration" class="w-full md:w-auto md:flex-1 flex items-end gap-3">
                    <FormKit type="number" min="0" label="Duration" name="duration" outer-class="!mb-0 w-2/3 md:flex-1" wrapper-class="!mb-0" />
                    <FormKit
                        type="select"
                        name="duration_unit"
                        label="Duration Unit"
                        :options="durationUnits?.data"
                        key="duration_unit"
                        validation="required"
                        :value="value?.duration_unit || getExercise(value.id)?.duration_unit || null"
                        outer-class="!mb-0 w-1/3 md:flex-1"
                        wrapper-class="!mb-0"
                    />
                </div>
                <div v-if="getExercise(value.id)?.has_calorie" class="w-full md:w-auto md:flex-1 flex items-end gap-3">
                    <FormKit type="number" min="0" label="Calorie" name="calorie" outer-class="!mb-0 w-2/3 md:flex-1" wrapper-class="!mb-0" />
                    <FormKit
                        type="select"
                        name="calorie_unit"
                        label="Calorie Unit"
                        :options="calorieUnits?.data"
                        key="calorie_unit"
                        validation="required"
                        :value="value?.calorie_unit || getExercise(value.id)?.calorie_unit || null"
                        outer-class="!mb-0 w-1/3 md:flex-1"
                        wrapper-class="!mb-0"
                    />
                </div>
            </div>
        </template>
    </FormKit>
</template>
