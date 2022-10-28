<?php
class SMS
{
    protected $api_username;
    protected $api_password;
    protected $sms_from;
    protected $url;
    protected $con_number;
    protected $message;

    function __construct()
    {
        //instantiate variables
        // $this->api_username = 'APIMA8M332RO8';
        // $this->api_password = 'APIMA8M332RO8MA8M3';
        $this->sms_from = 'rhums';
        $this->url = 'http://gateway.onewaysms.ph:10001/api.aspx?';
    }

    /**
     * func : sample code given by the api provider
     * @return json message and code [0 = fail, 1 = success]
     */
    private function gw_send_sms($user, $pass, $from, $sms_to, $message)
    {

        $query_string = "apiusername=" . $user . "&apipassword=" . $pass;
        $query_string .= "&senderid=" . rawurlencode($from) . "&mobileno=" . rawurlencode($sms_to);
        $query_string .= "&message=" . rawurlencode(stripslashes($message)) . "&languagetype=1";

        //concatinate url and the query string
        $url = "{$this->url}{$query_string}";
        $fd = @implode('', file($url));

        if (!$fd) {
            return [
                'message' => 'no contact with gateway',
                'code'    => 0
            ];
        }

        if ($fd < 0) {
            return [
                'message' => "Please refer to API on Error : {$fd}",
                'code'    => 0
            ];
        }

        return [
            'message' => "Success with MT ID : {$fd}",
            'code'    => 1
        ];
    }

    /**
     * @Function: Send SMS
     * Description: this is the one to use in controllers to accept input data
     * and send sms
     * @return array contain response code and message from api
     */
    public function sendSMS($con_number, $message)
    {

        $send = $this->gw_send_sms(
            $this->api_username,
            $this->api_password,
            $this->sms_from,
            $con_number,
            $message
        );

        return $send;
    }
}
