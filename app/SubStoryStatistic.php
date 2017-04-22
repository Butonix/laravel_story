<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubStoryStatistic extends Model
{
    protected $table = 'sub_story_statistic';
    protected $fillable = [
        'sub_story_id',
        'count_visitor',
        'count_like'
    ];
}
