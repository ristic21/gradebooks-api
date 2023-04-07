<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    public function gradebook(): BelongsTo
    {
        return $this->belongsTo(Gradebook::class);
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'image_url',
        'gradebook_id',
    ];
}
