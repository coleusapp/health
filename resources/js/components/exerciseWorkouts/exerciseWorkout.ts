export type ExerciseWorkout = {
    id: number;
    workout_id: number | null;
    exercise_id: number | null;
    reps: number | null;
    weight: number | null;
    weight_unit: string | null;
    distance: number | null;
    distance_unit: string | null;
    duration: number | null;
    duration_unit: string | null;
    calorie: number | null;
    calorie_unit: string | null;
};

export type ExerciseResource = {
    data: ExerciseWorkout;
}

export type ExerciseCollection = {
    data: ExerciseWorkout[];
};
