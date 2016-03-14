<?php
namespace App\Http\Controllers;

//use Aloha\Twilio\TwilioInterface;
use Twilio;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class SendDeploymentAlert
 * @package App\Handlers\Events
 */
class TwilioController extends Controller {
    //private $twilioClient;

    /**
     * Create the event handler.
     *
     */
    public function __construct()  {
    
    }
    
    public function sendmessage() {
    //$twilio = new Aloha\Twilio\Twilio($TWILIO_SID, $TWILIO_TOKEN, $TWILIO_FROM);

    $message = "testing twilio";
    $mob = '+9199116956';
    Twilio::message('+919199116956', 'hello this is for testing purpose');
   
    }
}
