<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Listing extends Model
{
    use HasFactory;

    protected $table = "listings";

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'department', 'email', 'phone', 'description', 'job_experience', 'job_level', 'employment_type', 'salary', 'job_photo', 'status', 'user_id'
    ];

    protected $visible = [
        'id', 'title', 'department', 'email', 'phone', 'description', 'job_experience', 'job_level', 'employment_type', 'salary', 'job_photo', 'created_at', 'status'
    ];

    // public function getCreatedAtAttribute($value)
    // {
    //     return Carbon::parse($value)->diffForHumans();
    // }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['department'] ?? false, function ($query, $department) {
            $query->where('department', 'like', '%' . $department . '%');
        });

        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('department', 'like', '%' . $search . '%')
                    ->orWhere('employment_type', 'like', '%' . $search . '%');
            });
        });

        // Apply employment type filter
        $query->when($filters['employment_type_filter'] ?? false, function ($query, $employmentType) {
            $query->where('employment_type', $employmentType);
        });

        // Apply experience level filter
        $query->when($filters['experience_level_filter'] ?? false, function ($query, $experienceLevel) {
            $query->where('job_level', $experienceLevel);
        });

        // Apply salary range filter
        $query->when($filters['salary_range_filter'] ?? false, function ($query, $salaryRange) {
            [$minSalary, $maxSalary] = explode('-', $salaryRange);
            $query->whereBetween('salary', [$minSalary, $maxSalary]);
        });

        // dd($query);
    }

    /**
     * Get the user that owns the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the requirements for the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function requirements(): HasMany
    {
        return $this->hasMany(Requirement::class);
    }

    /**
     * Get all of the responsibilities for the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function responsibilities(): HasMany
    {
        return $this->hasMany(Responsibility::class);
    }

    /**
     * The savedByUsers that belong to the Listing
     *
     * @return BelongsToMany
     */
    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'save_listings');
    }

    /**
     * Get all of the applications for the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications(): HasMany
    {
        return $this->hasMany(CandidateApplyListing::class, 'listing_id');
    }
}
