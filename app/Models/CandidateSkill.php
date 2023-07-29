<?php

namespace App\Models;

use App\Models\CandidateProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateSkill extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_prfile_id', 'skill_name'];

    /**
     * Get the profile that owns the CandidateSkill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}
