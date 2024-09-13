<?php

namespace App\Models;

use App\Concerns\AutoAssignUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OralCare extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AutoAssignUser;
}
