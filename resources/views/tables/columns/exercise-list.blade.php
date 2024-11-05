<div class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white py-2">
    <div class="flex flex-col">
        @foreach($getRecord()->exerciseWorkouts->groupBy('exercise_id') as $exerciseWorkoutGroup)
            @foreach($exerciseWorkoutGroup as $exerciseWorkout)
                <div>
                    @if ($loop->first)
                        <span class="font-semibold">{{ $exerciseWorkout->exercise->name }}</span>
                    @endif
                    <div class="flex flex-col">
                        @if ($exerciseWorkout->exercise->has_reps && $exerciseWorkout->exercise->has_weight)
                            {{ $exerciseWorkout->reps }} &times; {{ $exerciseWorkout->weight }} lbs
                        @endif
                        @if ($exerciseWorkout->exercise->has_distance)
                            {{ $exerciseWorkout->distance }}
                        @endif
                        @if ($exerciseWorkout->exercise->has_duration)
                            {{ $exerciseWorkout->duration }} Seconds
                        @endif
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
