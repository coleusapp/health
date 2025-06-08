<script setup lang="ts">
import { OptionCollection } from '@/types';
import { useForm } from '@formkit/inertia';
import ExerciseForm from '@coleus/health/components/exercises/parts/Form.vue';
import { Data, Resource } from '@coleus/health/components/exercises/type';

const props = defineProps<{
    resource: Resource;
    weightUnits: OptionCollection;
    distanceUnits: OptionCollection;
    durationUnits: OptionCollection;
    muscleGroups: OptionCollection;
    categories: OptionCollection;
}>();

const form = useForm<Omit<Data, 'id'>>({
    name: props.resource.data.name,
    description: props.resource.data.description,
    has_rep: props.resource.data.has_rep,
    has_calorie: props.resource.data.has_calorie,
    has_weight: props.resource.data.has_weight,
    weight_unit: props.resource.data.weight_unit,
    has_distance: props.resource.data.has_distance,
    distance_unit: props.resource.data.distance_unit,
    has_duration: props.resource.data.has_duration,
    duration_unit: props.resource.data.duration_unit,
    categories: props.resource.data?.categories,
    muscle_groups: props.resource.data?.muscle_groups,
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.patch(route('health.workouts.exercises.update', { exercise: resource.data.id }), {
                    onSuccess: () => $toast.add({ title: 'Exercise successfully updated!' }),
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
