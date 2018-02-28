<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    
  /**
   * Get the applications locations
   */
  public function locations()
  {
      return $this->hasMany('App\Models\Location');
  }
}
