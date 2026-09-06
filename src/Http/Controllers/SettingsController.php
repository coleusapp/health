<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Facades\Settings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SettingsController extends Controller
{
    public function general(): Response
    {
        return Inertia::render('settings/General', [
            'resource' => [
                'data' => [
                    'timezone' => Settings::get('general.timezone', 'UTC'),
                    'weight_unit' => Settings::get('general.weight_unit', WeightEnum::LBS->value),
                    'distance_unit' => Settings::get('general.distance_unit', DistanceEnum::Mile->value),
                    'duration_unit' => Settings::get('general.duration_unit', DurationEnum::Minute->value),
                    'calorie_unit' => Settings::get('general.calorie_unit', CalorieEnum::KCAL->value),
                ],
            ],
        ]);
    }

    public function save(Request $request)
    {
        Settings::set('general.timezone', $request->input('timezone'));
        Settings::set('general.weight_unit', $request->input('weight_unit'));
        Settings::set('general.distance_unit', $request->input('distance_unit'));
        Settings::set('general.duration_unit', $request->input('duration_unit'));
        Settings::set('general.calorie_unit', $request->input('calorie_unit'));

        return back();
    }
}
