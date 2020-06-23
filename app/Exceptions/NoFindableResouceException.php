<?php

namespace App\Exceptions;

use Exception;
use Facade\IgnitionContracts\Solution;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;

class NoFindableResouceException extends Exception implements ProvidesSolution
{
    public function __construct()
    {
        parent::__construct("The resourece cannot findable by Locator.");
    }

     /**
     * Get the solution.
     *
     * @return \Facade\IgnitionContracts\Solution
     */
    public function getSolution(): Solution
    {
        return BaseSolution::create("The resourece cannot findable by Locator.")
            ->setSolutionDescription(
                "Check that the resource specified is the full class name or is findable by Locator."
            );
    }
}