<script setup lang="ts">
import MuscleGroupForm from '@/components/muscleGroups/Form.vue';
import { MuscleGroupRequest, MuscleGroupResource, muscleGroupResourceKey } from '@/components/muscleGroups/muscleGroup';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(muscleGroupResourceKey) as MuscleGroupResource;

const form = useForm<MuscleGroupRequest>({
    name: resource.data.name,
    description: resource.data.description,
    muscle_group_id: resource.data.muscle_group_id,
});
const submit = () =>
    form.patch(route('health.muscle-groups.update', { muscle_group: resource.data.id }), {
        ...onSuccessToast(ToastType.UPDATE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <MuscleGroupForm :value="value as MuscleGroupRequest" />
    </Form>
</template>
