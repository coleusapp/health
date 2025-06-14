<script setup lang="ts">
import CategoryForm from '@coleus/health/components/categories/Form.vue';
import { CategoryRequest, CategoryResource } from '@coleus/health/components/categories/type';
import Form from '@coleus/support/components/form/Form.vue';
import { onErrorToast, onSuccessToast, ToastType } from '@coleus/support/lib/inertia';
import { useForm } from '@formkit/inertia';

const props = defineProps<{
    resource: CategoryResource;
}>();
const form = useForm<CategoryRequest>({
    name: props.resource?.data?.name || '',
});
const submit = () =>
    form.put(route('health.categories.update', { category: props.resource.data.id }), {
        ...onSuccessToast(ToastType.STORE_SUCCESS),
        ...onErrorToast(ToastType.ERROR),
    });
</script>
<template>
    <Form :form="form" :submit="submit">
        <CategoryForm />
    </Form>
</template>
