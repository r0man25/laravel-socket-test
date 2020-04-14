<?php

namespace App\Http\Controllers;

use App\Events\SocketChartChangedEvent;
use Illuminate\Http\Request;

/**
 * Class RealtimeController
 * @package App\Http\Controllers
 */
class RealtimeController extends Controller
{
    public function newEvent(Request $request)
    {
        $result = [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Data One',
                    'backgroundColor' => ['#f87979'],
                    'data' => [40, 39, 10, 40, 39, 80, 40]
                ]
            ]
        ];

        if ($request->has('label')) {
            $result['labels'][] = $request->get('label');
            $result['datasets'][0]['data'][] = (int) $request->get('sale');

            if (
                $request->has('realtime') &&
                filter_var($request->get('realtime'), FILTER_VALIDATE_BOOLEAN)
            ) {
                event(new SocketChartChangedEvent($result));
            }
        }

        return $result;
    }
}
