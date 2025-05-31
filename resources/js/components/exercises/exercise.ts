import { CategoryCollection } from '@health/components/categories/category';
import { MuscleGroupCollection } from '@health/components/muscleGroups/muscleGroup';

export type ExerciseData = {
    id: number;
    name: string | null;
    description: string | null;
    has_rep: boolean;
    has_weight: boolean;
    weight_unit: string | null,
    has_distance: boolean;
    distance_unit: string | null,
    has_calorie: boolean;
    has_duration: boolean;
    duration_unit: string | null;
    categories?: CategoryCollection,
    muscle_groups?: MuscleGroupCollection,
};

export type ExerciseResource = {
    data: ExerciseData;
}

export type ExerciseCollection = {
    data: ExerciseData[];
};
