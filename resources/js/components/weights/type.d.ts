export type Data = {
    id: string;
    weight: number;
    date: string;
    date_string: string;
    date_for_humans: string;
};

export type Resource = {
    data: Data;
}

export type Collection = {
    data: Data[];
};

export type Request = {
    weight: number;
    date: string;
};
