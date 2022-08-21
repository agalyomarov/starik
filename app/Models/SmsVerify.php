<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsVerify extends Model
{
    // use HasFactory;
    protected $table = 'sms_verifies';
    protected $guarded = [];
    public $timestamps = null;
}
