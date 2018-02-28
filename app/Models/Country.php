<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
	/**
   * Get the locations
   */
  public function locations()
  {
      return $this->hasMany('App\Models\Location');
  }
}
