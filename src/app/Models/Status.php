<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    use TenantModels;

    protected $table = 'status';

    protected $fillable = [
        'id',
        'name',
    ];
}
