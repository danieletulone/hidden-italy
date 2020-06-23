<?php

namespace App\Http\Controllers;

use App\Helpers\ResourceCounter;

class DashboardController extends Controller
{

    /**
     * Get the main section of dashboard.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function index()
    {
        return view('admin.dashboard.index', [
            'counts' => [
                'users' => ResourceCounter::users(),
                'monuments' => ResourceCounter::monuments(),
                'categories' => ResourceCounter::categories()
            ]
        ]);
    }
}
