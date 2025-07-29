import { Collection, Request, Resource } from '@coleus/support/types/resource';
import type { InjectionKey } from 'vue';
import { OptionCollection } from '@/types';

export type WeightData = {
    id: string;
    weight: number;
    unit: string | null;
    date: string;
    date_string: string;
    date_for_humans: string;
};

export type WeightResource = Resource<WeightData>;
export type WeightRequest = Request<Omit<WeightData, 'date_string' | 'date_for_humans'>>;
export type WeightCollection = Collection<WeightData>;

export const resourceKey = Symbol() as InjectionKey<WeightResource>;
export const weightUnitsKey = Symbol() as InjectionKey<OptionCollection>;
