<script setup lang="ts">
import { ExerciseRequest } from '@coleus/health/components/exercises/exercise';
import WorkoutForm from '@coleus/health/components/workouts/Form.vue';
import { WorkoutRequest, workoutResourceKey } from '@coleus/health/components/workouts/workout';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(workoutResourceKey) as workoutResourceKey;
const form = useForm<WorkoutRequest>({
    date: resource.data.date,
});
const submit = () =>
    form.post(route('health.workouts.store'), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <WorkoutForm :value="value as ExerciseRequest" />
    </Form>
</template>
