<?php

namespace App\Models;

use Call\Models\AbstractModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends AbstractModel
{
    use HasFactory;

    public function columns()
    {
       return [];
    }
}
