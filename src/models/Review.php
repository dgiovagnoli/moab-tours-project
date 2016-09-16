<?php
namespace Project\models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Review extends Eloquent
{
    public function user()
    {
        return $this->hasOne('Project\models\User');
    }
}
