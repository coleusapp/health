import { Collection, Request, Resource } from '@coleus/support/types/resource';
import type { InjectionKey } from 'vue';

export type MuscleGroupData = {
    id: number;
    name: string | null;
    description: string | null;
    muscle_group_id: number | null;
};

export type MuscleGroupResource = Resource<MuscleGroupData>;
export type MuscleGroupRequest = Request<MuscleGroupData>;
export type MuscleGroupCollection = Collection<MuscleGroupData>;

export const muscleGroupResourceKey = Symbol() as InjectionKey<MuscleGroupResource>;
export const muscleGroupsKey = Symbol() as InjectionKey<MuscleGroupCollection>;
