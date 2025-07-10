<script setup lang="ts">
import EditCategory from '@coleus/health/components/categories/Edit.vue';
import { Link } from '@inertiajs/vue3';
import Header from '@coleus/support/components/card/Header.vue';
</script>

<template>
    <UiCard>
        <template #header>
            <Header title="Update Category">
                <Link :href="route('health.categories.index')">
                    <UiButton trailing-icon="i-lucide-arrow-right" variant="ghost">All Categories</UiButton>
                </Link>
            </Header>
        </template>
        <EditCategory />
    </UiCard>
</template>
