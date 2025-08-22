<script setup lang="ts">
import OralCareForm from '@coleus/health/components/oralCares/Form.vue';
import { OralCareRequest, OralCareResource, oralCareResourceKey } from '@coleus/health/components/oralCares/oralCare';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(oralCareResourceKey) as OralCareResource;

const form = useForm<OralCareRequest>({
    date: resource.data.date,
    duration: resource.data.duration,
    brushed: !!resource.data.brushed,
    flossed: !!resource.data.flossed,
    fluoride_taken: !!resource.data.fluoride_taken,
    toothpastes: resource.data.toothpastes || [],
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
