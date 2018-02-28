<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	/**
   * Get the messages
   */
  public function messages()
  {
      return $this->hasMany('App\Models\Message');
  }

  /**
   * Get the application
   */
  public function application()
  {
      return $this->belongsTo('App\Models\Application');
  }


  public function getNameAttribute(){
  	return $this->application->name . " " . $this->provider;
  }

  /**
  * Get location list
  * 
  */
  public static function list(){
  	return Location::orderBy('provider')->get();
  }
}
