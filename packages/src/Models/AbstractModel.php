<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Models;

use Call\Models\Traits\Attribute;
use Call\Models\Traits\Foreign;
use Call\Models\Traits\HasScopeGenerate;
use Call\Models\Traits\Pagination;
use Call\Models\Traits\Search;
use Call\Models\Traits\Select;
use Call\Models\Traits\Sorting;
use Call\Models\Traits\Table;
use Call\Scopes\UuidGenerate;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractModel extends Model
{
    use UuidGenerate, Select, Search, Pagination,Sorting, Foreign, Attribute, Table, HasScopeGenerate;

}
