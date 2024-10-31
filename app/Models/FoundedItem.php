<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundedItem extends Model
{
    use HasFactory;

    // Specify the table name if it does not follow Laravel's naming conventions
    protected $table = 'founded_items';

    // Specify the fillable fields
    protected $fillable = [
        'name',
        'photo',
        'found_date',
        'location_option',
        'latitude',
        'longitude',
        'user_nim',
    ];

    /**
     * Define a relationship to the User model.
     * Assumes a User model exists and that `user_nim` is a foreign key
     * referencing `nim` in the `users` table.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_nim', 'nim');
    }

    public function claimHistory()
    {
        return $this->hasMany(ClaimHistory::class, 'founded_item', 'id');
    }
}
