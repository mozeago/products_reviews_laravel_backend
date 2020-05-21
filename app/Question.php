<?php

namespace App;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title',
        'description',
        'mode_of_response',
        'companyimage',
        'companyname',
        'award_amount',
    ];
    /**
     * Undocumented function
     *
     * @return void
     */
    public function responses()
    {
        return $this->hasMany('App\QuestionResponse');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}