<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Settings\GeneralSettings;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SettingsController extends Controller
{
    public function general(GeneralSettings $settings): Response
    {
        return Inertia::render('settings/General', [
            'resource' => [
                'data' => [
                    'timezone' => $settings->timezone,
                    'weight_unit' => $settings->weight_unit,
                    'distance_unit' => $settings->distance_unit,
                    'duration_unit' => $settings->duration_unit,
                    'calorie_unit' => $settings->calorie_unit,
                ],
            ],
        ]);
    }

    public function save(Request $request, GeneralSettings $settings)
    {
        $settings->timezone = $request->input('timezone');
        $settings->weight_unit = $request->input('weight_unit');
        $settings->distance_unit = $request->input('distance_unit');
        $settings->duration_unit = $request->input('duration_unit');
        $settings->calorie_unit = $request->input('calorie_unit');

        $settings->save();

        return back();
    }
}
