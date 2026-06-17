import { Collection, Request, Resource } from '@coleus/support/types/resource';
import type { InjectionKey } from 'vue';

export type CategoryData = {
    id: string;
    name: string;
    exercises_count: number | null;
};

export type CategoryResource = Resource<CategoryData>;
export type CategoryRequest = Request<CategoryData>;
export type CategoryCollection = Collection<CategoryData>;

export const resourceKey = Symbol() as InjectionKey<CategoryResource>;
