export type MuscleGroupData = {
    id: number;
    name: string | null;
    description: string | null;
    muscle_group_id: number | null;
};

export type MuscleGroupResource = {
    data: MuscleGroupData;
}

export type MuscleGroupCollection = {
    data: MuscleGroupData[];
};
