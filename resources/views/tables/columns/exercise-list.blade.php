<div class="fi-ta-text-item-label text-sm leading-6 text-gray-950 dark:text-white py-2">
    <div class="flex flex-col">
        @foreach($getRecord()->exerciseWorkouts as $exerciseWorkouts)
            <div>
                @if ($loop->first)
                    <span class="font-semibold">{{ $exerciseWorkouts->exercise->name }}</span>
                @endif
                <div class="flex flex-col">
                    <div>
                        @if ($exerciseWorkouts->exercise->has_reps)
                            <span>{{ $exerciseWorkouts->reps }}</span>
                            @if ($exerciseWorkouts->exercise->has_weight || $exerciseWorkouts->exercise->has_distance || $exerciseWorkouts->exercise->has_duration)
                            <span>&times;</span>
                            @endif
                        @endif
                        @if ($exerciseWorkouts->exercise->has_weight)
                            <span>{{ $exerciseWorkouts->weight }}</span>
                            <span>
                                {{ \App\Enums\WeightEnum::from($exerciseWorkouts->exercise?->weight_unit ?? app(GeneralSettings::class)->weight_unit)->name }}
                            </span>
                            @if ($exerciseWorkouts->exercise->has_distance || $exerciseWorkouts->exercise->has_duration)
                            <span>&times;</span>
                            @endif
                        @endif
                        @if ($exerciseWorkouts->exercise->has_distance)
                            <span>{{ $exerciseWorkouts->distance }}</span>
                            <span>
                                {{ \App\Enums\DistanceEnum::from($exerciseWorkouts->exercise?->distance_unit ?? app(GeneralSettings::class)->distance_unit)->name }}
                            </span>
                            @if ($exerciseWorkouts->exercise->has_duration)
                            <span>&times;</span>
                            @endif
                        @endif
                        @if ($exerciseWorkouts->exercise->has_duration)
                            <span>{{ $exerciseWorkouts->duration }}</span>
                            <span>
                                {{ \App\Enums\DurationEnum::from($exerciseWorkouts->exercise?->duration_unit ?? app(GeneralSettings::class)->duration_unit)->name }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
