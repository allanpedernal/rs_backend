<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table name (optional if it follows Laravel conventions)
    protected $table = 'blogs';

    // Define the fillable fields (mass assignment)
    protected $fillable = [
        'title',
        'content',
        'status',
        'created_by'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
