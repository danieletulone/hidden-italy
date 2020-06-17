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
    private float $range = 3000;

    public function __construct(Request $request)
    {
        $this->lat = $request->input('lat');
        $this->lon = $request->input('lon');
    }

    final private function buildQuery($resource)
    {
        return Monument::select()
            ->addSelect($this->selectDistanceQuery())
            ->having('distance', '<', $this->getRange())
            ->with('categories')
            ->with('category')
            ->with('images')
            ->take(10)
            ->skip(request()->input('page') - 1 ?? 1)
            ->withCasts([
                'distance' => MetersToKmCast::class
            ])
            ->get();
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

    public function find($resource)
    {
        throw_unless(
            in_array($resource, $this->findableResources),
            NoFindableResouceException::class
        );

        return $this->buildQuery($resource);
    }
}