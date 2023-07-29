<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Requirement extends Model
{
    use HasFactory;

    protected $table = "requirements";

    protected $primaryKey = 'id';

    protected $fillable = ['listing_id', 'content'];

    protected $visible = ['listing_id', 'content'];

    /**
     * Get the listing that owns the Requirement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
    
}
