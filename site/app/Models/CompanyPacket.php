<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CompanyPacket extends Model
{
    use HasFactory;
    protected $table = "company_packets";
    public $timestamps = false;

    protected $fillable = [
        'packet_id',
        'company_id',
        'start_date',
        'end_date',
        'status'
    ];

    protected $hidden = [
        'packet_id',
        'company_id',
        'id'
    ];

}
