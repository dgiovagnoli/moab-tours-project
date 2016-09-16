<?php namespace Project\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent {

  public function reviews()
  {
    return $this->hasMany('Project\models\Review');
  }
}
