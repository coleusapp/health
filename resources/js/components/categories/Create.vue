<script setup lang="ts">
import CategoryForm from '@coleus/health/components/categories/Form.vue';
import { CategoryRequest, CategoryResource } from '@coleus/health/components/categories/type';
import Form from '@coleus/support/components/form/Form.vue';
import { useForm } from '@formkit/inertia';

const form = useForm<CategoryRequest>({
    name: '',
});
const submit = () =>
    form.post(route('health.categories.store'), {
        onSuccess: () => useToast().add({ title: 'Successfully added!' }),
    });
</script>
<template>
    <Form :form="form" :submit="submit">
        <CategoryForm />
    </Form>
</template>
