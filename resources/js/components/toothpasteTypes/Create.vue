<script setup lang="ts">
import { useForm } from '@formkit/inertia';
import WeightForm from '@coleus/health/components/workouts/categories/parts/Form.vue';

const form = useForm({
    name: null,
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.post(route('health.workouts.categories.store'), {
                    onSuccess: () => $toast.add({ title: 'Category successfully added!' }),
                })(fields, node)
        "
        :plugins="[form.plugin]"
        submit-label="Save"
    >
        <WeightForm />
        <template #submit>
            <UiButton type="submit" :disabled="form.processing.value">Save</UiButton>
        </template>
    </FormKit>
</template>
