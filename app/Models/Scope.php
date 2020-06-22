<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    
    protected $fillable = [
        'name',
        'description'
    ];

    public $timestamps = false;

    /**
     * List crud actions.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    public static array $crudActions = [
        'create', 
        'read', 
        'update', 
        'delete',
        'manage',
    ];

    /**
     * List of all resource of app.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    public static array $resources = [
        'categories', 
        'comments',
        'monuments', 
        'roles', 
        'scopes', 
    ];

    /**
     * Scopes to add.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    public static array $scopes = [
        'use-admin-dashboard' => 'Allow to enter into admin dashboard',
        'suggests-monuments'  => 'Allow to suggest a monument',
        'report-users'        => 'Allow to report a user'
    ];
}
