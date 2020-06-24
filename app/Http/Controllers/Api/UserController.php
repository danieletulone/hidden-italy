<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\Date\NoDayProvidedException;
use App\Exceptions\Date\NoMonthProvidedException;
use App\Exceptions\Date\NoYearProvidedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\DateClusterRequest;
use App\Models\User;
use Arr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Get the params for fetching by date.
     *
     * @param Request $request
     * @param boolean $year
     * @param boolean $month
     * @param boolean $day
     * 
     * @return void
     */
    private function getDateParams(
        Request $request, 
        bool $year, 
        bool $month, 
        bool $day
    ) {
        if ($year) {
            throw_if(
                $request->year == null,
                NoYearProvidedException::class
            );
        }

        if ($month) {
            throw_if(
                $request->month == null 
                || $request->month < 1 
                || $request->month > 12,
                NoMonthProvidedException::class
            );
        }

        if ($day) {
            throw_if(
                $request->day == null,
                NoDayProvidedException::class
            );
        }

        return [
            'day'   => $request->day,
            'month' => $request->month,
            'year'  => $request->year,
        ];
    }

    /**
     * Get the user by joined date.
     * Can fetch data using day, month and/or year.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param DateClusterRequest $request
     * @return void
     */
    public function joined(DateClusterRequest $request)
    {
        $cluster = $request->cluster;

        if ($cluster == 'day') {
            $params = $this->getDateParams($request, true, true, true);
        }

        if ($cluster == 'month') {
            $params = Arr::only(
                $this->getDateParams($request, true, true, false),
                ['year', 'month']
            );
        }

        if ($cluster == 'year') {
            $params = Arr::only(
                $this->getDateParams($request, true, false, false),
                ['year']
            );
        }

        $method = 'joined' . ucfirst($cluster);

        return User::$method(...array_values($params))->get();
    }

    /**
     * Get personal info about current logged user.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function show()
    {
        return auth()->user();
    }

    /**
     * Get visited monuments of current logged user.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @return array
     */
    public function visitedMonuments()
    {
        return auth()->user()->visitedMonuments;
    }
}
