<script setup lang="ts">
import { useForm } from '@formkit/inertia';
import { Resource, Request } from '@health/components/weights/type';
import WeightForm from '@health/components/weights/parts/Form.vue';

const props = defineProps<{
    resource: Resource;
}>();

const form = useForm<Request>({
    weight: props.resource.data.weight,
    date: props.resource.data.date,
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.put(route('health.weights.update', { weight: resource.data.id }), {
                    onSuccess: () => $toast.add({ title: 'Weight successfully added!' }),
                })(fields, node)
        "
        :plugins="[form.plugin]"
    >
        <WeightForm />
        <template #submit>
            <UiButton type="submit" :disabled="form.processing.value">Save</UiButton>
        </template>
    </FormKit>
</template>
