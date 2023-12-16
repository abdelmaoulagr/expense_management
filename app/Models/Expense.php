<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public $timestamps= false;
    protected $table = 'expense';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'pm_id',
        'cat_id',
        'title',
        'amount',

    ];
}
