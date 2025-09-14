<script setup lang="ts">
import HealthLayout from '@/layouts/HealthLayout.vue';
import TableCard from '@/components/exercises/TableCard.vue';
import { ExerciseCollection } from '@/components/exercises/exercise';

defineProps<{
    collection: ExerciseCollection;
}>();
</script>

<template>
    <HealthLayout>
        <TableCard :collection="collection" />
    </HealthLayout>
</template>
