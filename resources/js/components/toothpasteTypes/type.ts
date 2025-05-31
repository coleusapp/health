export type Data = {
    id: string;
    name: string;
};

export type Resource = {
    data: Data;
}

export type Collection = {
    data: Data[];
};

export type Request = {
    name: string;
};
