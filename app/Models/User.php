<?php

namespace App\Models;

use App\Exceptions\DateNotValidException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname',
        'name', 'email', 'password',
        'role_id', 'email_verified_at',
        'image_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'image_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'date:d-m-y',
        'created_at' => 'date:d-m-Y',
        'updated_at' => 'date:d-m-Y',
    ];

    /**
     * Check if current user has a scope.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param string $scope
     * @return boolean
     */
    public function hasScope(string $scope): bool
    {
        return in_array($scope, $this->role->scopes);
    }

    /**
     * Check if current user has a set of scopes.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @param array $scopes
     * @return boolean
     */
    public function hasScopes(array $scopes): bool
    {
        $has = true;

        foreach ($scopes as $scope) {
            if (!$this->hasScope($scope)) {
                $has = false;
                break;
            }
        }

        return $has;
    }

    /**
     * Get the role of user.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Get the profile image of user.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function image()
    {
        return $this->hasOne('App\Models\Image');
    }

    public function monuments()
    {
        return $this->hasMany('App\Models\Monument');
    }

    /**
     * Scope user by gmail account.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $query
     * @return void
     */
    public function scopeGmail($query)
    {
        return $query->where('email', 'LIKE', '@gmail.com')
                     ->sortBy('created_at', 'DESC')
                     ->take(30);
    }

    /**
     * Get user joined during given day.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $query
     * @param integer $day
     * @param integer $month
     * @param integer $year
     * @return void
     */
    public function scopeJoinedDay($query, int $day, int $month, int $year)
    {
        $this->checkDate($day, $month, $year);

        return $query->whereDay('created_at', $day)
                     ->whereMonth('created_at', $month)
                     ->whereYear('created_at', $year);
    }

    /**
     * Get user joined during given month
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>.
     *
     * @param [type] $query
     * @param integer $month
     * @param integer $year
     * @return void
     */
    public function scopeJoinedMonth($query, int $month, int $year)
    {
        $this->checkDate($month, 1, $year);

        return $query->whereMonth('created_at', $month)
                     ->whereYear('created_at', $year);
    }

    /**
     * Get user joined during given year.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $query
     * @param int $year
     * @return void
     */
    public function scopeJoinedYear($query, int $year)
    {
        $this->checkDate(1, 1, $year);

        return $query->whereYear('created_at', $year);
    }

    /**
     * Check if a date is valid
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @throws DateNotValidException
     * @param int $day
     * @param int $month
     * @param int $year
     * 
     * @return boolean
     */
    final private function checkDate($day, $month, $year): void
    {
        throw_unless(
            checkdate($month, $day, $year), 
            DateNotValidException::class
        );
    }

    public function visitedMonuments()
    {
        return $this->hasManyThrough(
            'App\Models\Monument',
            'App\Models\MonumentUser',
            'monument_id',
            'id',
            'id',
            'user_id'
        );
    }
}
