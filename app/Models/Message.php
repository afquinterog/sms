<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Database;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Jobs\SendSms;

use Illuminate\Support\Facades\Log;

class Message extends Model
{

	use ValidatesRequests;

  use SoftDeletes;

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
   * Save or update the model information
   *
   * @param array $data 
   */
  public function saveOrUpdate(array $data)
  {
    return $this->persist( Message::class, $data);		
  }

	/**
   * Get the location
   */
  public function location()
  {
      return $this->belongsTo('App\Models\Location');
  }

  public function getData(){
  	return "";
  }

  public static function create($phone, $message, $location){

    $data = [
      'to' => $phone,
      'message' => $message,
      'location_id' => $location
    ];

    $smsMessage = (new Message)->persist( Message::class, $data);

    SendSms::dispatch($smsMessage);

    return $smsMessage;

  }
}






