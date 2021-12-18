<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nameday extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'month', 'day'
    ];

    public static function getNameDay($val)
    {
        $val = explode('-', $val);
        
        return Nameday::where('month', $val[0])
            ->where('day', $val[1])
            ->value('name');
    }
}
