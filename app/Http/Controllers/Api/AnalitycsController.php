<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnalitycsController extends Controller
{
    public function joined(Request $request)
    {
        $resource = "App\Models\\" . ucfirst($request->resource);

        $users = $resource::selectRaw('created_at, YEAR(created_at) as year, MONTH(created_at) as month')
            ->whereBetween('created_at', [$request->from, $request->to])
            ->orderBy('created_at', 'ASC')
            ->get()
            ->toArray();

        $days = [];

        foreach ($users as $user) {
            if (isset($days[$user['created_at']])) {
                $days[$user['created_at']] += 1;
            } else {
                $days[$user['created_at']] = 1;
            }
        }

        return [
            "labels" => array_keys($days),
            "values" => array_values($days)
        ];
    }
}
