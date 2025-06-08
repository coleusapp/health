<script setup lang="ts">
import { OptionCollection } from '@/types';
import EditExercise from '@coleus/health/components/exercises/Edit.vue';
import { Resource } from '@coleus/health/components/exercises/type';
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';

defineProps<{
    weight_units: OptionCollection;
    distance_units: OptionCollection;
    duration_units: OptionCollection;
    muscle_groups: OptionCollection;
    categories: OptionCollection;
    resource: Resource;
}>();
</script>

<template>
    <HealthLayout>
        <EditExercise
            :resource="resource"
            :weight-units="weight_units"
            :distance-units="distance_units"
            :duration-units="duration_units"
            :muscle-groups="muscle_groups"
            :categories="categories"
        />
    </HealthLayout>
</template>
