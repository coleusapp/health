import { ExerciseResource } from '@coleus/health/components/exercises/exercise';
import { ExerciseWorkout } from '@coleus/health/components/exerciseWorkouts/exerciseWorkout';

export type WorkoutData = {
    id: number;
    date: string | null;
    exercises?: ExerciseWorkout[]
};

export type WorkoutResource = {
    data: WorkoutData;
}

export type WorkoutCollection = {
    data: WorkoutData[];
};
