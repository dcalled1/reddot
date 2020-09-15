<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function memberCommunities() {
        return $this->belongsToMany('App\Models\Community', 'user_member_community');
    }

    public function adminCommunities() {
        return $this->belongsToMany('App\Models\Community', 'user_admin_community');
    }

    public function modCommunities() {
        return $this->belongsToMany('App\Models\Community', 'user_mod_community');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post', 'author_id');
    }

    public function likedPosts() {
        return $this->belongsToMany('App\Models\Post', 'user_like_post');
    }

    public function dislikedPosts() {
        return $this->belongsToMany('App\Models\Post', 'user_dislike_post');
    }

    public function savedPosts() {
        return $this->belongsToMany('App\Models\Post', 'user_save_post');
    }
}
