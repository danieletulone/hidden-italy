<?php

namespace App\Services\Locator;

use App\Casts\MetersToKmCast;
use App\Exceptions\NoFindableResouceException;
use App\Models\Monument;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Locator
{

    /**
     * The resource that app can find by Locator.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    private array $findableResources = [
        Monument::class,
        User::class
    ];

    /**
     * The 'from' lat value.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var float
     */
    private float $lat;

    /**
     * The 'from' lon value.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var float
     */
    private float $lon;

    /**
     * The range around the from Locator in which find resources.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var float
     */
    private float $range;

    /**
     * Set the lat and lon getting them from request.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->lat = $request->input('lat');
        $this->lon = $request->input('lon');
		$this->range = $request->input('range') ?? 3000;
    }

    /**
     * Build and execute the query for find resources.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $resource
     * @return [type]
     */
    final private function buildQuery($resource)
    {
        return $resource::select(['id', 'name', 'category_id', 'lat', 'lon'])
            ->addSelect($this->selectDistanceQuery())
            ->having('distance', '<', $this->getRange())
            ->with('category')
            ->with(['images' => function ($query) {
                return $query->select(['id', 'url', 'monument_id']);
            }])
            // ->take(request()->input('per_page') ?? 10)
            // ->skip(request()->input('page') - 1 ?? 1)
            ->withCasts([
                'distance' => MetersToKmCast::class
            ])
            ->orderBy('distance', 'ASC')
            ->get();
    }

    /**
     * Find resouce by current location and range.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $resource
     * @return void
     */
    final public function find($resource)
    {
        throw_unless(
            in_array($resource, $this->findableResources),
            NoFindableResouceException::class
        );

        throw_unless(
            $this->lat && $this->lon,
            NoLocationProvidedException::class
        );

        return $this->buildQuery($resource);
    }

    /**
     * The SQL query to calculate distance
     * between 'from' Locator and resource Locator.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    final private function selectDistanceQuery()
    {
        return DB::raw(sprintf('
            ST_Distance_Sphere(
                point(%f, %f),
                point(lat, lon)
            ) as distance',
            $this->lat,
            $this->lon
        ));
    }

    //--------------------------------
    //       GETTERS & SETTERS       |
    //--------------------------------

    /**
     * Get the value of lon
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     */
    public function getLon(): float
    {
        return $this->lon;
    }

    /**
     * Set the value of lon
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * @return  self
     */
    public function setLon($lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    /**
     * Get the value of lat
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * @return float lat Current value of lat
     */
    public function getLat(): float
    {
        return $this->lat;
    }

    /**
     * Set the value of lat
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return  self
     */
    public function setLat($lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get the value of range
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     */
    public function getRange(): float
    {
        return $this->range;
    }

    /**
     * Set the value of range
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return  self
     */
    public function setRange($range): self
    {
        $this->range = $range;

        return $this;
    }
}
