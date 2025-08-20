<script setup lang="ts">
import OralCareForm from '@coleus/health/components/oralCares/Form.vue';
import { OralCareRequest } from '@coleus/health/components/oralCares/oralCare';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';

const form = useForm<OralCareRequest>({
    date: null,
    duration: null,
    brushed: null,
    flossed: null,
    fluoride_taken: null,
});
const submit = () =>
    form.post(route('health.oral-cares.store'), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>

<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <OralCareForm :value="value as OralCareRequest" />
    </Form>
</template>
