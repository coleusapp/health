<script setup lang="ts">
import { OptionCollection } from '@/types';
import { useForm } from '@formkit/inertia';
import MuscleGroupForm from '@coleus/health/components/muscleGroups/parts/Form.vue';
import { Data } from '@coleus/health/components/muscleGroups/type';

defineProps<{
    muscleGroups: OptionCollection;
}>();

const form = useForm<Omit<Data, 'id'>>({
    name: null,
    description: null,
    muscle_group_id: null,
});
</script>
<template>
    <FormKit
        type="form"
        @submit="
            (fields, node) =>
                form.post(route('health.workouts.muscle-groups.store'), {
                    onSuccess: () => $toast.add({ title: 'Muscle group successfully added!' }),
                })(fields, node)
        "
        :plugins="[form.plugin]"
        submit-label="Save"
    >
        <template #default="{ value }">
            <MuscleGroupForm
                :muscle-groups="muscleGroups"
            />
        </template>
        <template #submit>
            <UiButton type="submit" :disabled="form.processing.value">Save</UiButton>
        </template>
    </FormKit>
</template>
