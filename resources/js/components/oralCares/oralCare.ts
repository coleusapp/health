import { Collection, Request, Resource } from '@coleus/support/types/resource';
import type { InjectionKey } from 'vue';
import { OptionCollection } from '@/types';
import { OralCareToothpaste } from '@/components/oralCareToothpaste/oralCareToothpaste';

export type OralCareData = {
    id: number;
    date: string | null;
    duration: number | null;
    brushed: boolean | null;
    flossed: boolean | null;
    fluoride_taken: boolean | null;
    toothpastes?: OralCareToothpaste[]
};

export type OralCareResource = Resource<OralCareData>;
export type OralCareRequest = Request<OralCareData>;
export type OralCareCollection = Collection<OralCareData>;

export const oralCareResourceKey = Symbol() as InjectionKey<OralCareResource>;
export const oralCaresKey = Symbol() as InjectionKey<OralCareCollection>;
export const toothpastesKey = Symbol() as InjectionKey<OptionCollection>;
