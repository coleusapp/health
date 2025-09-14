<script setup lang="ts">
import WeightForm from '@/components/categories/Form.vue';
import { CategoryRequest, CategoryResource, resourceKey } from '@/components/categories/category';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';
import { inject } from 'vue';

const resource = inject(resourceKey) as CategoryResource;

const form = useForm<CategoryRequest>({
    name: resource.data.name,
});
const submit = () =>
    form.patch(route('health.categories.update', { category: resource.data.id }), {
        ...onSuccessToast(ToastType.UPDATE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <WeightForm :value="value as CategoryRequest" />
    </Form>
</template>
