<script setup lang="ts">
import { useForm } from '@formkit/inertia';
import WeightForm from '@coleus/health/components/weights/parts/Form.vue';
import { Resource } from '@coleus/health/components/weights/type';

const props = defineProps<{
    resource: Resource;
}>();

const form = useForm({
    weight: props.resource.data.weight,
    date: props.resource.data.date,
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.post(route('health.weights.store'), {
                    onSuccess: () => $toast.add({ title: 'Weight successfully added!' }),
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
