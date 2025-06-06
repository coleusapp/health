<script setup lang="ts">
import { CategoryCollection } from '@health/components/categories/category';
import HealthLayout from '@health/layouts/HealthLayout.vue';

defineProps<{
    collection: CategoryCollection;
}>();
</script>
<template>
    <HealthLayout>
        Categories {{collection}}
    </HealthLayout>
</template>

