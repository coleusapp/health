export type ExerciseWorkout = {
    id: number;
    workout_id: number | null;
    exercise_id: number | null;
    reps: number | null;
    weight: number | null;
    distance: number | null;
    duration: number | null;
    calorie: number | null;
};

export type ExerciseResource = {
    data: ExerciseWorkout;
}

export type ExerciseCollection = {
    data: ExerciseWorkout[];
};
