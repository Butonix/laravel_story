<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryStatistic extends Model
{
    protected $table = 'story_statistic';
    protected $primaryKey = 'story_id';
    protected $fillable = [
        'count_visitor',
        'count_like'
    ];
}
