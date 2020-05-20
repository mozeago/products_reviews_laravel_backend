<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

/**
 * Undocumented class
 */

class QuestionResponse extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'status',
        'video_url',
    ];
    /**
     * Undocumented function
     *
     * @return void
     */
    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}