import { CategoryCollection } from '@coleus/health/components/categories/type';
import { MuscleGroupCollection } from '@coleus/health/components/muscleGroups/muscleGroup';
import { Collection, Request, Resource } from '@coleus/support/types/resource';

export type ExerciseData = {
    id: number;
    name: string | null;
    description: string | null;
    has_rep: boolean;
    has_weight: boolean;
    weight_unit: string | null;
    has_distance: boolean;
    distance_unit: string | null;
    has_calorie: boolean;
    has_duration: boolean;
    duration_unit: string | null;
    categories?: CategoryCollection;
    muscle_groups?: MuscleGroupCollection;
};

export type ExerciseResource = Resource<ExerciseData>;
export type ExerciseRequest = Request<ExerciseData>;
export type ExerciseCollection = Collection<ExerciseData>;
