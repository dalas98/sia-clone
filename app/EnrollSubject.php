<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrollSubject extends Model
{
    protected $guarded = ['id'];

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }
}
