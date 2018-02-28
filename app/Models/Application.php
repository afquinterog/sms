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

  /**
   * Save or update the model information
   *
   * @param array $data
   */
  public function saveOrUpdate(array $data)
  {
    return $this->persist( Message::class, $data);
  }
  
}
