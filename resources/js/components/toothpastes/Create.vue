<script setup lang="ts">
import ToothpasteForm from '@/components/toothpastes/Form.vue';
import { ToothpasteRequest } from '@/components/toothpastes/Toothpaste';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';

const form = useForm<ToothpasteRequest>({
    name: null,
});
const submit = () =>
    form.post(route('health.toothpastes.store'), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>

<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <ToothpasteForm :value="value as ToothpasteRequest" />
    </Form>
</template>
