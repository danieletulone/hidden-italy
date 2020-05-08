<?php

namespace App\Exceptions\Auth;

use Exception;
use Facade\IgnitionContracts\Solution;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;

class NoTokenProvidedException extends Exception implements ProvidesSolution
{
    public function getSolution(): Solution
    {
        return BaseSolution::create('No token provided.')
            ->setSolutionDescription('Cannot return a response without token.');
    }
}
