<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import HealthLayout from '@health/layouts/HealthLayout.vue';
import Create from '@health/components/workoutCategories/Create.vue';
</script>

<template>
    <AppLayout>
        <Head title="New Category" />
        <HealthLayout>
            <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
                <HeadingSmall title="New Category" />
                <div class="flex max-w-xl flex-col">
                    <Create class="space-y-6" />
                </div>
            </div>
        </HealthLayout>
    </AppLayout>
</template>
