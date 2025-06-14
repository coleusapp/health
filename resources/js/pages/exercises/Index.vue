<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import ExerciseTable from '@coleus/health/components/exercises/Table.vue';
import { ExerciseCollection } from '@coleus/health/components/exercises/exercise';

defineProps<{
    collection?: ExerciseCollection;
}>();
</script>

<template>
    <HealthLayout>
        <ExerciseTable :collection="collection" />
    </HealthLayout>
</template>
