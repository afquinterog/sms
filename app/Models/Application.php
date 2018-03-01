<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Database;
use Illuminate\Foundation\Validation\ValidatesRequests;


class Application extends Model
{

	use ValidatesRequests;

  use Database;

	/**
   * The attributes that aren't mass assignable.
   *
   * @var array
   */
  protected $guarded = [ ];

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];
	
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
		return $this->persist( Application::class, $data);
	}

}
