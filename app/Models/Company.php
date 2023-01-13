<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        "num_asset",
        "date_into",
        "name_asset",
        "detail",
        "unit",
        "place",
        "per_price",
        "status_buy",
        "num_old_asset",
        "pic",
        "fullname",
        "department",
        "name_info",
        "num_department",
        "budget"

        /* 
                "code_money",
        "name_money",

        */
    ];

    public function cash()
    {
        return $this->belongsTo(Cash::class, 'code_money_id');
    }
}