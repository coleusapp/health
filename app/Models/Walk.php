<?php

namespace App\Models;

use App\Casts\TimezoneDatetime;
use App\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Walk extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoAssignUser;

    public function casts()
    {
        return [
            'date' => TimezoneDatetime::class,
        ];
    }
}
