<div class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white py-2">
    <div class="flex flex-col gap-2">
        @foreach($getRecord()->exerciseWorkouts as $exerciseWorkouts)
            <div class="flex flex-col">
                <span class="font-semibold">{{ $exerciseWorkouts->exercise->name }}</span>
                <div>
                    @if ($exerciseWorkouts->exercise->has_rep && $exerciseWorkouts->reps)
                        <span>{{ $exerciseWorkouts->reps }}</span>
                        @if ($exerciseWorkouts->exercise->has_weight || $exerciseWorkouts->exercise->has_distance || $exerciseWorkouts->exercise->has_duration)
                            <span>&times;</span>
                        @endif
                    @endif
                    @if ($exerciseWorkouts->exercise->has_weight && $exerciseWorkouts->weight)
                        <span>{{ $exerciseWorkouts->weight }}</span>
                        <span>
                                {{ \App\Enums\WeightEnum::from($exerciseWorkouts->exercise?->weight_unit ?? app(GeneralSettings::class)->weight_unit)->name }}
                            </span>
                        @if ($exerciseWorkouts->exercise->has_distance || $exerciseWorkouts->exercise->has_duration)
                            <span>&times;</span>
                        @endif
                    @endif
                    @if ($exerciseWorkouts->exercise->has_distance && $exerciseWorkouts->distance)
                        <span>{{ $exerciseWorkouts->distance }}</span>
                        <span>
                                {{ \Illuminate\Support\Str::plural(\App\Enums\DistanceEnum::from($exerciseWorkouts->exercise?->distance_unit ?? app(GeneralSettings::class)->distance_unit)->name, $exerciseWorkouts->distance) }}
                            </span>
                        @if ($exerciseWorkouts->exercise->has_duration)
                            <span>&times;</span>
                        @endif
                    @endif
                    @if ($exerciseWorkouts->exercise->has_duration && $exerciseWorkouts->duration)
                        <span>{{ $exerciseWorkouts->duration }}</span>
                        <span>
                                {{ \Illuminate\Support\Str::plural(\App\Enums\DurationEnum::from($exerciseWorkouts->exercise?->duration_unit ?? app(GeneralSettings::class)->duration_unit)->name, $exerciseWorkouts->duration) }}
                            </span>
                    @endif
                </div>
                @if ($exerciseWorkouts->exercise->has_calorie && $exerciseWorkouts->calorie)
                    <div class="italic">
                        {{ $exerciseWorkouts->calorie }} Calories
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
