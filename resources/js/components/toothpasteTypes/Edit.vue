<script setup lang="ts">
import CategoryForm from '@health/components/categories/Form.vue';
import { useForm } from '@inertiajs/vue3';
import { CategoryResource } from '@health/types/category';

const props = defineProps<{
    category: CategoryResource;
}>();

const form = useForm<{ name: string }>({
    name: props.category.data.name || '',
});

const submit = () => {
    form.patch(route('health.categories.update', { category: props.category.data.id }), {
        preserveScroll: true,
    });
};
</script>
<template>
    <form @submit.prevent="submit">
        <CategoryForm v-model="form" />
    </form>
</template>
