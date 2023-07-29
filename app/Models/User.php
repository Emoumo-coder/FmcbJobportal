<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\SocialMediaLink;
use App\Models\CandidateProfile;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    /**
     * Get all of the listings for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    /**
     * Get all of the applications for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(CandidateApplyListing::class);
    }

    /**
     * The savedListings that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function savedListings(): BelongsToMany
    {
        return $this->belongsToMany(Listing::class, 'save_listings');
    }

    /**
     * Get the profile associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(CandidateProfile::class);
    }


    /**
     * Get all of the socialMediaLinks for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialMediaLinks(): HasMany
    {
        return $this->hasMany(SocialMediaLink::class);
    }

    /**
     * Get all of the sentInboxes for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentInboxes(): HasMany
    {
        return $this->hasMany(Inbox::class, 'sender_id');
    }

    /**
     * Get all of the receivedInboxes for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function receivedInboxes(): HasMany
    {
        return $this->hasMany(Inbox::class, 'receiver_id');
    }
}
