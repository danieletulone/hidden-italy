<?php

namespace App\View\Traits;

use Cache;
use Str;
use Arr;

trait IsUsable
{
    public function shouldRender(): bool
    {
        $scopes = Cache::get('scopes');
        $scopeToCheck = Str::kebab(class_basename(static::class));

        if (property_exists($this, 'name')) {
            $scopeToCheck .= '-' . $this->name;
        }

        if (in_array($scopeToCheck, Arr::pluck($scopes, ['name']))) {
            if (!in_array($scopeToCheck, auth()->user()->role->scopes)) {
                return false;
            }
        }

        return true;
    }
}