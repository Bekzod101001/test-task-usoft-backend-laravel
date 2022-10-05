<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidTrait
{
    /**
     * Override the boot function from Laravel so that
     * we give the model a new UUID when we create it.
     */
    protected static function boot()
    {
        parent::boot();

        $creationCallback = function ($model) {
            if (empty($model->uuid))
            {
                $model->uuid = Str::uuid()->toString();
            }
        };

        static::creating($creationCallback);
    }

}
