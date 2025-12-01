import { Collection, Request, Resource } from '@coleus/support/types/resource';
import type { InjectionKey } from 'vue';
import { OptionCollection } from '@/types';

export type SettingsData = {
    timezone?: string;
    weight_unit?: string;
    distance_unit?: string;
    duration_unit?: string;
    calorie_unit?: string;
};

export type SettingsResource = Resource<SettingsData>;
export type SettingsRequest = Request<SettingsData>;
export type SettingsCollection = Collection<SettingsData>;

export const resourceKey = Symbol() as InjectionKey<SettingsResource>;
export const settingsUnitsKey = Symbol() as InjectionKey<OptionCollection>;
