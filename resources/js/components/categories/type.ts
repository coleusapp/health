import { Collection, Request, Resource } from '@coleus/support/types/resource';

export type CategoryData = {
    id: string;
    name: string;
};

export type CategoryResource = Resource<CategoryData>;
export type CategoryRequest = Request<CategoryData>;
export type CategoryCollection = Collection<CategoryData>;
