<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportVisitor extends Model
{
    protected $table = 'report_visitor';
    protected $fillable = [
        'ip_address'
    ];
}
