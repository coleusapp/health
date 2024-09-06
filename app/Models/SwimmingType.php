<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SwimmingType extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function save(array $options = [])
    {
        $this->user_id = auth()->id();

        return parent::save($options);
    }
}
