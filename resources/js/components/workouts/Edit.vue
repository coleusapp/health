<script setup lang="ts">
import { OptionCollection } from '@/types';
import { useForm } from '@formkit/inertia';
import WorkoutForm from '@coleus/health/components/workouts/Form.vue';
import { WorkoutData, WorkoutResource } from '@coleus/health/components/workouts/workout';
import { toRaw } from 'vue';

const props = defineProps<{
    resource: WorkoutResource;
    exercises: OptionCollection;
}>();

const form = useForm<Omit<WorkoutData, 'id'>>({
    date: props.resource.data.date,
    exercises: toRaw(props.resource.data.exercises),
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.patch(route('health.workouts.update', { workout: resource.data.id }), {
                    onSuccess: () => $toast.add({ title: 'Workout successfully updated!' }),
                })(fields, node)
        "
        :plugins="[form.plugin]"
        submit-label="Save"
    >
        <template #default="{ value }">
            <WorkoutForm :value="value as Omit<WorkoutData, 'id'>" :exercises="exercises" />
        </template>
        <template #submit>
            <UiButton type="submit" :disabled="form.processing.value">Save</UiButton>
        </template>
    </FormKit>
</template>
