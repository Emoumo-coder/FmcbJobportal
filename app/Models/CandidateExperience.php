<?php

namespace App\Models;

use App\Models\CandidateProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

    class CandidateExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_profile_id', 'title', 'company', 'period', 'description'
    ];

    /**
     * Get the profiile that owns the CandidateExperience
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profiile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class, 'candidate_profile_id');
    }
}
