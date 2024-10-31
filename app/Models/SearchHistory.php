<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchHistory extends Model
{
    use HasFactory;

    // Specify the table name if it does not follow Laravel's naming conventions
    protected $table = 'search_histories';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'user_nim',
        'lost_item_name',
        'lost_date',
        'lost_location_option',
        'latitude',
        'longitude',
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
}
