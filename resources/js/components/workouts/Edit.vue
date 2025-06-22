<script setup lang="ts">
import WorkoutForm from '@coleus/health/components/workouts/Form.vue';
import { WorkoutRequest, WorkoutResource, workoutResourceKey } from '@coleus/health/components/workouts/workout';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject, toRaw } from 'vue';

const resource = inject(workoutResourceKey) as WorkoutResource;

const form = useForm<WorkoutRequest>({
    date: resource.data.date,
    exercises: toRaw(resource.data.exercises),
});

const submit = () =>
    form.put(route('health.workouts.update', { workout: resource.data.id }), {
        ...onSuccessToast(ToastType.UPDATE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <WorkoutForm :value="value as WorkoutRequest" />
    </Form>
</template>
