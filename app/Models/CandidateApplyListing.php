<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateApplyListing extends Model
{
    use HasFactory;

    protected $fillable = [
            'user_id', 'listing_id', 'first_name', 'last_name', 'email', 'phone_number',
            'personal_url', 'resume', 'message', 'status'
    ];

    protected $vissible = [
        'user_id', 'listing_id', 'first_name', 'last_name', 'email', 'phone_number',
            'personal_url', 'resume', 'message', 'status', 'created_at'
    ];

    /**
     * Get the user that owns the CandidateApplyListing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the listing that owns the CandidateApplyListing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}
