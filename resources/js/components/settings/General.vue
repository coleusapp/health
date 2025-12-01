<script setup lang="ts">
import GeneralForm from '@/components/settings/Form.vue';
import { SettingsRequest, resourceKey, SettingsResource } from '@/components/settings/settings';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(resourceKey) as SettingsResource;

const form = useForm<SettingsRequest>({
    timezone: resource.data.timezone,
    weight_unit: resource.data.weight_unit,
    distance_unit: resource.data.distance_unit,
    duration_unit: resource.data.duration_unit,
    calorie_unit: resource.data.calorie_unit,
});
const submit = () =>
    form.post(route('health.settings.save'), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit">
        <template #default="{ value }">
            <GeneralForm :value="value as SettingsRequest" />
        </template>
    </Form>
</template>
