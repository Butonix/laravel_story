<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportVisit extends Model
{
    protected $table = 'report_visit';

    protected $fillable = [
        'ip_address'
    ];
}
