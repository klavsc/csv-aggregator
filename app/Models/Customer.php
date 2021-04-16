<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = [
        'name',
        'surname',
        'email',
        'address',
        'city',
        'gender',
        'soc_security_num',
        'balance',
    ];

    public static function getCustomer()
    {
        $records = DB::table('clients')->select(
            'id',
            'name',
            'surname',
            'email',
            'address',
            'city',
            'gender',
            'soc_security_num',
            'balance',
        );
        return $records;
    }
    public $timestamps = false;
}
