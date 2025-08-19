import { Collection, Request, Resource } from '@coleus/support/types/resource';
import type { InjectionKey } from 'vue';

export type ToothpasteData = {
    id: number;
    name: string | null;
};

export type ToothpasteResource = Resource<ToothpasteData>;
export type ToothpasteRequest = Request<ToothpasteData>;
export type ToothpasteCollection = Collection<ToothpasteData>;

export const ToothpasteResourceKey = Symbol() as InjectionKey<ToothpasteResource>;
