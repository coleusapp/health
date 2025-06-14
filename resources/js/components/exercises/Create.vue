<script setup lang="ts">
import ExerciseForm from '@coleus/health/components/exercises/Form.vue';
import { ExerciseRequest } from '@coleus/health/components/exercises/exercise';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';

const form = useForm<ExerciseRequest>({
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
