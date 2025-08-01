import { Collection, Request, Resource } from '@coleus/support/types/resource';
import type { InjectionKey } from 'vue';
import { ExerciseWorkout } from '@coleus/health/components/exerciseWorkouts/exerciseWorkout';
import { OptionCollection } from '@/types';

export type WorkoutData = {
    id: number;
    date: string | null;
    exercises?: ExerciseWorkout[]
};

export type WorkoutResource = Resource<WorkoutData>;
export type WorkoutRequest = Request<WorkoutData>;
export type WorkoutCollection = Collection<WorkoutData>;

export const workoutResourceKey = Symbol() as InjectionKey<WorkoutResource>;
export const weightUnitsKey = Symbol() as InjectionKey<OptionCollection>;
export const distanceUnitsKey = Symbol() as InjectionKey<OptionCollection>;
export const durationUnitsKey = Symbol() as InjectionKey<OptionCollection>;
export const calorieUnitsKey = Symbol() as InjectionKey<OptionCollection>;

