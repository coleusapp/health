<script setup lang="ts">
import HealthLayout from '@coleus/health/layouts/HealthLayout.vue';
import TableCard from '@coleus/health/components/exercises/TableCard.vue';
import { ExerciseCollection } from '@coleus/health/components/exercises/exercise';

defineProps<{
    collection: ExerciseCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
