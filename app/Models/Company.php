<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        "num_asset", "unit", "created_at",
        "updated_at", "name_asset", "detail", "date_into",
        "place", "status_buy", "num_old_asset", "per_price", "pic"
    ];
}