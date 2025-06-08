<script setup lang="ts">
import CategoryForm from '@coleus/health/components/categories/Form.vue';
import { CategoryRequest, CategoryResource } from '@coleus/health/components/categories/type';
import Form from '@coleus/support/components/form/Form.vue';
import { useForm } from '@formkit/inertia';

const props = defineProps<{
    resource: CategoryResource;
}>();
const form = useForm<CategoryRequest>({
    name: props.resource?.data?.name || '',
});
const submit = () =>
    form.put(route('health.categories.update', { category: props.resource.data.id }), {
        onSuccess: () => useToast().add({ title: 'Successfully added!' }),
    });
</script>
<template>
    <Form :form="form" :submit="submit">
        <CategoryForm />
    </Form>
</template>
