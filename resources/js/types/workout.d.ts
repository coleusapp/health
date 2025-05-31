import { Table } from '@/types';
import { InertiaForm } from '@inertiajs/vue3';

export type Workout = {
    date?: string;
};

export type Form = InertiaForm<Workout>;

export interface WorkoutResource {
    data: Workout;
}

interface WorkoutTable extends Table {
    records: WorkoutResource[];
}
