import { ExerciseResource } from '@health/components/exercises/exercise';
import { ExerciseWorkout } from '@health/components/exerciseWorkouts/exerciseWorkout';

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
