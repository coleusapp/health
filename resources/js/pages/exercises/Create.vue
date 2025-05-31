<script setup lang="ts">
import { OptionCollection } from '@/types';
import CreateExercise from '@health/components/exercises/Create.vue';
import HealthLayout from '@health/layouts/HealthLayout.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    weight_units: OptionCollection;
    distance_units: OptionCollection;
    duration_units: OptionCollection;
    muscle_groups: OptionCollection;
    categories: OptionCollection;
}>();
</script>

<template>
    <Head title="Create Exercise" />
    <HealthLayout>
        <CreateExercise
            :weight-units="weight_units"
            :distance-units="distance_units"
            :duration-units="duration_units"
            :muscle-groups="muscle_groups"
            :categories="categories"
        />
    </HealthLayout>
</template>
