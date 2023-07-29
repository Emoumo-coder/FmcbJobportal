<?php

namespace App\Models;

use App\Models\User;
use App\Models\CandidateSkill;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'location', 'phone', 'cover_photo', 'photo', 'about'
    ];

    /**
     * Get the user that owns the CandidateProfile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the skills for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills(): HasMany
    {
        return $this->hasMany(CandidateSkill::class, 'candidate_profile_id', 'id');
    }

    /**
     * Get all of the education for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function education(): HasMany
    {
        return $this->hasMany(CandidateEducation::class, 'candidate_profile_id', 'id');
    }

    /**
     * Get all of the experiences for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function experiences(): HasMany
    {
        return $this->hasMany(CandidateExperience::class, 'candidate_profile_id', 'id');
    }
}
