<script setup lang="ts">
import ToothpasteForm from '@coleus/health/components/toothpastes/Form.vue';
import { ToothpasteRequest, ToothpasteResource, ToothpasteResourceKey } from '@coleus/health/components/toothpastes/Toothpaste';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(ToothpasteResourceKey) as ToothpasteResource;

const form = useForm<ToothpasteRequest>({
    name: resource.data.name,
});
const submit = () =>
    form.patch(route('health.toothpastes.update', { toothpaste: resource.data.id }), {
        ...onSuccessToast(ToastType.UPDATE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <ToothpasteForm :value="value as ToothpasteRequest" />
    </Form>
</template>
