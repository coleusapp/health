<script setup lang="ts">
import { OptionCollection } from '@/types';
import { FormKit } from '@formkit/vue';
import { WorkoutData } from '@health/components/workouts/workout';
import { cloneDeep, find, memoize } from 'lodash';

const props = defineProps<{
    value: Omit<WorkoutData, 'id'>;
    exercises: OptionCollection;
}>();

const getExercise = memoize((exerciseId: number) => {
    return find(props.exercises.data, (item) => [item?.value].includes(exerciseId));
});
</script>
<template>
    <FormKit type="datetime-local" name="date" label="Date" validation="required" />
    <FormKit type="repeater" name="exercises" label="Exercises" validation="required" :min="0">
        <template #default="{ value }">
            <FormKit type="select" label="Exercise" name="id" :options="cloneDeep(exercises.data)" />
            <template v-if="getExercise(value.id)?.has_rep">
                <FormKit type="number" label="Reps" name="reps" />
            </template>
            <template v-if="getExercise(value.id)?.has_weight">
                <FormKit type="number" label="Weight" name="weight" :help="getExercise(value.id).weight_unit" />
            </template>
            <template v-if="getExercise(value.id)?.has_distance">
                <FormKit type="number" label="Distance" name="distance" :help="getExercise(value.id).distance_unit" />
            </template>
            <template v-if="getExercise(value.id)?.has_duration">
                <FormKit type="number" label="Duration" name="duration" :help="getExercise(value.id).duration_unit" />
            </template>
            <template v-if="getExercise(value.id)?.has_calorie">
                <FormKit type="number" label="Calorie" name="calorie" />
            </template>
        </template>
    </FormKit>
</template>
