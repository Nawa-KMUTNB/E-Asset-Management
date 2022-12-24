<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Money extends Model
{
    use HasFactory;


    protected $table = 'money';
    protected $fillable = [
        "code_money",
        "name_money",
        "budget"
    ];
}