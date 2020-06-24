<?php

namespace App\View\Traits;

use Cache;
use Str;
use Arr;

trait IsUsable
{

    /**
     * Check auto-deducted scope and specified bu method.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return boolean
     */
    public function shouldRender(): bool
    {
        $scopes = Cache::get('scopes');
        $scope = $this->getScopeForComponent();
        
        if (in_array($scope, Arr::pluck($scopes, ['name']))) {
            if (!auth()->user()->hasScope($scope)) {
                return false;
            }
        }

        if (method_exists($this, 'checkScopes')) {
            return $this->checkScopes();
        }

        return true;
    }

    /**
     * Auto-deduction of scope name.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @return void
     */
    public function getScopeForComponent()
    {
        $scopeToCheck = Str::kebab(class_basename(static::class));

        if (property_exists($this, 'name')) {
            $scopeToCheck .= '-' . $this->name;
        }

        return $scopeToCheck;
    }
}