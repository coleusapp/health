<script setup lang="ts">
import ExerciseForm from '@/components/exercises/Form.vue';
import { ExerciseRequest, ExerciseResource, exerciseResourceKey } from '@/components/exercises/exercise';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(exerciseResourceKey) as ExerciseResource;

const form = useForm<ExerciseRequest>({
    name: resource.data.name,
    description: resource.data.description,
    has_rep: resource.data.has_rep,
    has_calorie: resource.data.has_calorie,
    calorie_unit: resource.data.calorie_unit,
    has_weight: resource.data.has_weight,
    weight_unit: resource.data.weight_unit,
    has_distance: resource.data.has_distance,
    distance_unit: resource.data.distance_unit,
    has_duration: resource.data.has_duration,
    duration_unit: resource.data.duration_unit,
    categories: resource.data?.categories,
    muscle_groups: resource.data?.muscle_groups,
});
const submit = () =>
    form.patch(route('health.exercises.update', { exercise: resource.data.id }), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <ExerciseForm :value="value as ExerciseRequest" />
    </Form>
</template>
