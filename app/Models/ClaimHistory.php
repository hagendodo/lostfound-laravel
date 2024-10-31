<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimHistory extends Model
{
    use HasFactory;

    // Specify the table name if it does not follow Laravel's naming conventions
    protected $table = 'claim_histories';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'user_nim',
        'founded_item',
        'ip',
        'validation_photo_items',
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

    /**
     * Define a relationship to the FoundedItem model.
     * Assumes a FoundedItem model exists and that `founded_item` is a foreign key
     * referencing `id` in the `founded_items` table.
     */
    public function foundedItem()
    {
        return $this->belongsTo(FoundedItem::class, 'founded_item', 'id');
    }
}
