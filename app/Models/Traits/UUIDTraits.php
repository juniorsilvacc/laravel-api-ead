<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait UUIDTraits
{
    public static function booted()
    {
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
