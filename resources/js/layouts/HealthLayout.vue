<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
import Aside from '@coleus/health/components/Aside.vue';
</script>

<template>
    <AppLayout>
        <!--<template #header>Health</template>-->
        <!--<template #name>Health</template>-->
        <!--<div class="flex items-center justify-between gap-5 border-b border-b-zinc-200 p-2 text-sm">-->
        <!--    <div class="w-full flex items-center gap-3">-->
        <!--        &lt;!&ndash;<UiButton icon="i-lucide-x" size="xs" variant="ghost" color="neutral" class="rounded-full"></UiButton>&ndash;&gt;-->
        <!--        &lt;!&ndash;<UiButton icon="i-lucide-minus" size="xs" variant="ghost" color="neutral" class="rounded-full"></UiButton>&ndash;&gt;-->
        <!--        &lt;!&ndash;<UiDrawer direction="left" :overlay="false" :handle="false">&ndash;&gt;-->
        <!--        &lt;!&ndash;    <UiButton color="neutral" size="lg" variant="ghost" icon="i-lucide-menu" class="rounded-full" />&ndash;&gt;-->
        <!--        &lt;!&ndash;    <template #content>&ndash;&gt;-->
        <!--        &lt;!&ndash;        <Aside />&ndash;&gt;-->
        <!--        &lt;!&ndash;    </template>&ndash;&gt;-->
        <!--        &lt;!&ndash;</UiDrawer>&ndash;&gt;-->
        <!--        <Link :href="route('health.dashboard')">-->
        <!--            <UiButton color="neutral" size="lg" variant="ghost" icon="i-lucide-apple" class="rounded-full" label="Health" />-->
        <!--        </Link>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="flex h-full">
            <div class="w-full flex flex-row max-h-full">
                <Aside class="p-2" />
                <div class="flex flex-col w-full h-full overflow-y-scroll p-2">
                    <slot />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
