import { OptionCollection } from '@/types';
import { Collection, Request, Resource } from '@coleus/support/types/resource';
import { type InjectionKey } from 'vue';

export type ExerciseData = {
    id: number;
    name: string | null;
    description: string | null;
    has_rep: boolean;
    has_weight: boolean;
    weight_unit: string | null;
    has_distance: boolean;
    distance_unit: string | null;
    has_calorie: boolean;
    has_duration: boolean;
    duration_unit: string | null;
    categories?: { id: number }[];
    muscle_groups?: { id: number }[];
};

export type ExerciseResource = Resource<ExerciseData>;
export type ExerciseRequest = Request<ExerciseData>;
export type ExerciseCollection = Collection<ExerciseData>;

export const exerciseResourceKey = Symbol() as InjectionKey<ExerciseResource>;
export const exerciseCollectionKey = Symbol() as InjectionKey<ExerciseCollection>;
export const weightUnitsKey = Symbol() as InjectionKey<OptionCollection>;
export const distanceUnitsKey = Symbol() as InjectionKey<OptionCollection>;
export const durationUnitsKey = Symbol() as InjectionKey<OptionCollection>;
export const muscleGroupsKey = Symbol() as InjectionKey<OptionCollection>;
export const categoriesKey = Symbol() as InjectionKey<OptionCollection>;
