<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import InputError from '@/components/InputError.vue';
import { Form } from '@coleus/health/types/category';

const form = defineModel<Form>({ required: true });
</script>

<template>
    <div class="space-y-6">
        <div class="grid gap-2">
            <Label for="name">Name</Label>
            <Input
                id="name"
                class="mt-1 block w-full"
                v-model="form.name"
                required
                autocomplete="name"
                placeholder="Enter name"
            />
            <InputError class="mt-2" :message="form.errors.name" />
        </div>

        <div class="flex items-center gap-4">
            <Button :disabled="form.processing">Save</Button>
        </div>
    </div>
</template>
