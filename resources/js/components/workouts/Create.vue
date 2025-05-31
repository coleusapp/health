<script setup lang="ts">
import { OptionCollection } from '@/types';
import { useForm } from '@formkit/inertia';
import WorkoutForm from '@health/components/workouts/parts/Form.vue';
import { WorkoutData } from '@health/components/workouts/workout';

defineProps<{
    exercises: OptionCollection;
}>();

const form = useForm<Omit<WorkoutData, 'id'>>({
    date: null,
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.post(route('health.workouts.store'), {
                    onSuccess: () => $toast.add({ title: 'Workout successfully added!' }),
                })(fields, node)
        "
        :plugins="[form.plugin]"
        submit-label="Save"
    >
        <template #default="{ value }">
            <WorkoutForm
                exercises: OptionCollection;
            />
        </template>
        <template #submit>
            <UiButton type="submit" :disabled="form.processing.value">Save</UiButton>
        </template>
    </FormKit>
</template>
