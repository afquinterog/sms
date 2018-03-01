<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Database;
use Illuminate\Foundation\Validation\ValidatesRequests;


class Application extends Model
{

	use ValidatesRequests;

  use Database;

  protected $fillable = ['code','name'];

  /**
   * Get the applications locations
   */
  public function locations()
  {
      return $this->hasMany('App\Models\Location');
  }

}
