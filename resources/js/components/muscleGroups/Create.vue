<script setup lang="ts">
import MuscleGroupForm from '@/components/muscleGroups/Form.vue';
import { MuscleGroupRequest } from '@/components/muscleGroups/muscleGroup';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';

const form = useForm<MuscleGroupRequest>({
    name: null,
    description: null,
    muscle_group_id: null,
});
const submit = () =>
    form.post(route('health.muscle-groups.store'), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>

<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <MuscleGroupForm :value="value as MuscleGroupRequest" />
    </Form>
</template>
