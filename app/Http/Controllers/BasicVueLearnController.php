<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

/**
 * Class BasicVueLearnController
 * @package App\Http\Controllers
 */
class BasicVueLearnController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('welcome', [
            'url_data' => [
                [
                    'title' => 'Git Lab',
                    'url' => 'https://about.gitlab.com/',
                ],
                [
                    'title' => 'Git Hub',
                    'url' => 'https://github.com/',
                ],
                [
                    'title' => 'Bitbucket',
                    'url' => 'https://bitbucket.org/dashboard/overview',
                ],
            ]
        ]);
    }

    /**
     * @return array
     */
    public function getUrlData()
    {
        sleep(1);
        return [
            [
                'title' => 'Git Lab',
                'url' => 'https://about.gitlab.com/',
            ],
            [
                'title' => 'Git Hub',
                'url' => 'https://github.com/',
            ],
            [
                'title' => 'Bitbucket',
                'url' => 'https://bitbucket.org/dashboard/overview',
            ],
        ];
    }

    public function getChartData()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Data One',
                    'backgroundColor' => ['#f87979', '#1b4b72', '#2fa360', '#171a1d', '#9561e2', '#ffe817', '#686868'],
                    'data' => [40, 39, 10, 40, 39, 80, 40]
                ]
            ]
        ];
    }

    public function getRandomChartData()
    {
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Data One',
                    'backgroundColor' => ['#f87979'],
                    'data' => $this->generateRandomNumbersArray()
                ],
                [
                    'label' => 'Data Two',
                    'backgroundColor' => ['#1b4b72'],
                    'data' => $this->generateRandomNumbersArray()
                ],
            ]
        ];
    }

    private function generateRandomNumbersArray(? int $count = 7)
    {
        $array = [];
        $i = 0;

        while ($i <= $count) {
            $array[] = rand(1, 100);
            $i++;
        }

        return $array;
    }
}
