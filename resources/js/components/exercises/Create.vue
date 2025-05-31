<script setup lang="ts">
import { OptionCollection } from '@/types';
import { useForm } from '@formkit/inertia';
import ExerciseForm from '@health/components/exercises/parts/Form.vue';
import { Data } from '@health/components/exercises/type';

const props = defineProps<{
    weightUnits: OptionCollection;
    distanceUnits: OptionCollection;
    durationUnits: OptionCollection;
    muscleGroups: OptionCollection;
    categories: OptionCollection;
}>();

const form = useForm<Omit<Data, 'id'>>({
    name: null,
    description: null,
    has_rep: true,
    has_calorie: false,
    has_weight: true,
    weight_unit: null,
    has_distance: false,
    distance_unit: null,
    has_duration: false,
    duration_unit: null,
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.post(route('health.workouts.exercises.store'), {
                    onSuccess: () => $toast.add({ title: 'Exercise successfully added!' }),
                })(fields, node)
        "
        :plugins="[form.plugin]"
        submit-label="Save"
    >
        <template #default="{ value }">
            <ExerciseForm
                :value="value as Omit<Data, 'id'>"
                :weight-units="weightUnits"
                :distance-units="distanceUnits"
                :duration-units="durationUnits"
                :muscle-groups="muscleGroups"
                :categories="categories"
            />
        </template>
        <template #submit>
            <UiButton type="submit" :disabled="form.processing.value">Save</UiButton>
        </template>
    </FormKit>
</template>
