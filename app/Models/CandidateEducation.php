<?php

namespace App\Models;

use App\Models\CandidateProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateEducation extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_profile_id', 'title', 'school_name', 'period', 'description'
    ];

    /**
     * Get the profile that owns the CandidateEducation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}
