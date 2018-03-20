<?php
namespace App\Services\Sms;

use App\Contracts\Sms;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

/**
* Create a dummy snapshot for testing purposes
*/
class SmsJasmin implements Sms
{

	/**
	 * App\Models\Message
	 */
	private $message;

	const STATUS_OK = 200;


	private $messageStructure = "http://178.218.168.139:1401/send?username=SMS_USERNAME&password=SMS_PASSWORD&to=PHONE_NUMBER&from=SMSInfor&content=SMS_MESSAGE&dlr=yes&dlr-url=http://185.46.34.61/response.php&dlr-level=3";

	/**
  * Constructor
  */
	public function __construct($message)
	{

		$this->message = $message;
	}


  /**
  * Send the msg using the Jasmin Api
  */
	public function send()
	{

		$msg = $this->createMessage();

		$result = $this->sendMessage( $msg );

		if( $result->status == SmsJasmin::STATUS_OK ){
			
			$this->message->status = SMS::SENT_OK;
			$this->message->platformCode = $result->code;
			$this->message->save();

			//success callbacsk
		}
		else{

			$this->message->status = SMS::SENT_ERROR;
			$this->message->save();

			//error calback
		}

		return $result;
	}

	/**
	* Create the sms message
	* 
	* @param boolean $mode
	*/
	public function createMessage(){
		$msg = str_replace("PHONE_NUMBER", $this->message->to, $this->messageStructure );
		$msg = str_replace("SMS_MESSAGE", $this->message->message, $msg );
		$msg = str_replace("SMS_USERNAME", config("app.SMS_JASMIN_USERNAME"), $msg );
		$msg = str_replace("SMS_PASSWORD", config("app.SMS_JASMIN_PASSWORD"), $msg );

		return $msg;
	}

	/**
	* Create the sms message
	* 
	* @param boolean $mode
	*/
	public function sendMessage( $msg ){

		$client = new \GuzzleHttp\Client();
		
		$result = $client->request('GET', $msg );
		
		$resultCode =  explode("\"", $result->getBody()->getContents() );

		return (object) array( 'status' => $result->getStatusCode() , 'code' => $resultCode[1] );
	}

	/**
	* Enable/disable debug mode
	* 
	* @param boolean $mode
	*/
	public function setDebugMode($mode){
		$this->debug = $mode;
	}

	/**
  * Callback to call when the sms send operation is success
  *
  * @return void
  */
  public function onSuccess($callback){

  }

  /**
  * Callback to call when the sms send operation generate an error
  *
  * @return void
  */
  public function onError($callback){

  }
}

