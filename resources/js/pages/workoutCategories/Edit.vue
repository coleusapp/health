<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import Edit from '@health/components/categories/Edit.vue';
import { CategoryResource } from '@health/types/category';
import HealthLayout from '@health/layouts/HealthLayout.vue';
import HeadingSmall from '@/components/HeadingSmall.vue';

defineProps<{
    category: CategoryResource;
}>();
</script>

<template>
    <AppLayout>
        <Head title="Edit Category" />
        <HealthLayout>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <HeadingSmall title="Edit Category" />
                <div class="flex max-w-xl flex-col">
                    <Edit :category="category" />
                </div>
            </div>
        </HealthLayout>
    </AppLayout>
</template>
