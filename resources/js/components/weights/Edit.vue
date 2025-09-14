<script setup lang="ts">
import WeightForm from '@/components/weights/Form.vue';
import { resourceKey, WeightRequest, WeightResource } from '@/components/weights/weight';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(resourceKey) as WeightResource;

const form = useForm<WeightRequest>({
    weight: resource.data.weight,
    unit: resource.data.unit,
    date: resource.data.date,
});
const submit = () =>
    form.patch(route('health.weights.update', { weight: resource.data.id }), {
        ...onSuccessToast(ToastType.UPDATE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <WeightForm :value="value as WeightRequest" />
    </Form>
</template>
