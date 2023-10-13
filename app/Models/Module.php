<?php

namespace App\Models;

use App\Models\Traits\UUIDTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    use UUIDTraits;

    public $incrementing = false;

    protected $keyType = 'uuid';

    protected $fillable = [
        'name',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}