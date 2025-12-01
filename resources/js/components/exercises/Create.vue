<script setup lang="ts">
import ExerciseForm from '@/components/exercises/Form.vue';
import { ExerciseRequest, ExerciseResource, exerciseResourceKey } from '@/components/exercises/exercise';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(exerciseResourceKey) as ExerciseResource;


const form = useForm<ExerciseRequest>({
    name: null,
    description: null,
    has_rep: true,
    has_calorie: false,
    calorie_unit: resource.data.calorie_unit || null,
    has_weight: true,
    weight_unit: resource.data.weight_unit || null,
    has_distance: false,
    distance_unit: resource.data.distance_unit || null,
    has_duration: false,
    duration_unit: resource.data.duration_unit || null,
    categories: [],
    muscle_groups: [],
});
const submit = () =>
    form.post(route('health.exercises.store'), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <ExerciseForm :value="value as ExerciseRequest" />
    </Form>
</template>
