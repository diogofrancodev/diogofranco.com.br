<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

class CategoryPost extends Model  implements Auditable
{
    use HasFactory, SoftDeletes, AuditableTrait;

    protected $softDelete = true;

    protected $fillable = [
        'name'
    ];



    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class, 'category_posts_id');
    }
}
