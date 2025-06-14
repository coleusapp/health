<script setup lang="ts">
import CategoryForm from '@coleus/health/components/categories/Form.vue';
import { CategoryRequest } from '@coleus/health/components/categories/category';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';

const form = useForm<CategoryRequest>({
    name: '',
});
const submit = () =>
    form.post(route('health.categories.store'), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit" #default="{ value }">
        <CategoryForm :value="value as CategoryRequest" />
    </Form>
</template>
