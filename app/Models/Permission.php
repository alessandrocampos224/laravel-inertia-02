<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App\Models;

use Call\Support\Acl\Models\AbstractPermission;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends AbstractPermission
{
    use HasFactory;

    public function columns()
    {
        return [];
    }
}
