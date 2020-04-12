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
}
