<?php

namespace App\Contracts;

/**
 * Represent a generic sms
 */ 
interface Sms
{


  const SENT_OK = 1;
  const SENT_ERROR = -1;
	
	/**
  * Send the sms
  *
  * @return void
  */
  public function send();

  /**
  * Callback to call when the sms send operation is success
  *
  * @return void
  */
  public function onSuccess($callback);

  /**
  * Callback to call when the sms send operation generate an error
  *
  * @return void
  */
  public function onError($callback);

}