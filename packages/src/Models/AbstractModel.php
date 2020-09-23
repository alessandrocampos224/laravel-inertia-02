<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Models;

use Call\Scopes\UuidGenerate;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    use UuidGenerate;
}
