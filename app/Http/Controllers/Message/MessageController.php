<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \stdClass;

class MessageController extends Controller
{
    public function message($sl_no, $phone_no, $account_id, $recharge_amount, $service_type, $contact_number, $ssl_transaction_id)
    {

        // params start
        // $sl_no              = mysql_result($send_sms, $i, 'sl');
        // $phone_no           = mysql_result($send_sms, $i, 'phone_no');
        // $recharge_amount    = mysql_result($send_sms, $i, 'recharge_amount');
        // $service_type       = mysql_result($send_sms, $i, 'service_type');
        // $account_id         = mysql_result($send_sms, $i, 'account_id');
        // $contact_number     = mysql_result($send_sms, $i, 'contact_number');
        // $ssl_transaction_id = mysql_result($send_sms, $i, 'ssl_transaction_id');
        // end

        // $smsnotification = sms($sl_no, $phone_no, $account_id, $recharge_amount, $service_type, $contact_number, $ssl_transaction_id);
        // SMS returned report

        // http://api.rankstelecom.com/api/v3/sendsms/plain
        // ?
        // user=Rupy
        // &
        // password=Kht@123!
        // &
        // SMSText=TEST
        // &
        // GSM=8801710281427
        // &
        // type=longSMS
        // &
        // datacoding=8

        $sms_to_number  = '88' . $contact_number;
        $datajson->from = '8804445600001';
        $smstext        = 'Your Acount has been recharged by TK ' . $recharge_amount . ' To ' . $phone_no . ' With Service Type ' . $service_type . " Your Transaction ID " . $ssl_transaction_id;
        $datajson->to   = $sms_to_number;
        $datajson->text = $smstext;
        $data_json      = json_encode($datajson);

        $data_json = '{
            "sender": "044XXXXXXXX",
            "text": "Hello",
            "recipients": [
                {
                    "gsm": "8801793724391"
                },
                {
                    "gsm": "8801685627791"
                }
            ],
            "type": "longSMS",
            "datacoding": 8,
            "fbclid": "IwAR0dRYxd--Taz7eXXaFvx6chzjia1UPnDNkrzp3ms9xwL7p6cbqxyUmYYT8"
        }';
        $authorization  = base64_encode('Rupy:Kht@123!');
        $ch             = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            "Authorization: Basic $authorization"
        ));
        //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_URL, 'http://api.rankstelecom.com/api/v3/sendsms/plain');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        //var_dump(curl_getinfo($ch));
        var_dump($response);
        $err = curl_error($ch);
        //return $err;

        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $json = json_decode($response, true);

            /*
            print_r($json);
            echo $json['transactionId'];

            $balanceadded=$json['transactionId'];
            */
            //echo $response;
        }

        return $response;

    }

    // public function sendSMS() {
    //
    //     // $datajson = new stdClass();
    //     $datajson = new class{};
    //
    //     $sms_to_number  = '8801793724391';
    //     $datajson->from = '8804445600000';
    //     $smstext        = 'Your Acount has been recharged by TK';
    //     $datajson->to   = $sms_to_number;
    //     $datajson->text = $smstext;
    //     $data_json      = json_encode($datajson);
    //     // $data_json = '{
    //     //     "sender": "8804445600000",
    //     //     "text": "Hello",
    //     //     "recipients": [
    //     //         {
    //     //             "gsm": "8801793724391"
    //     //         }
    //     //     ],
    //     //     "type": "longSMS",
    //     //     "datacoding": 8,
    //     //     "fbclid": "IwAR0dRYxd--Taz7eXXaFvx6chzjia1UPnDNkrzp3ms9xwL7p6cbqxyUmYYT8"
    //     // }';
    //     // http://api.rankstelecom.com/api/v3/sendsms/plain?user=Rupy&password=Kht@123!&SMSText=TEST&GSM=8801710281427&type=longSMS&datacoding=8&fbclid=IwAR0dRYxd--Taz7eXXaFvx6chzjia1UPnDNkrzp3ms9xwL7p6cbqxyUmYYT8
    //     $authorization  = base64_encode('Rupy:Kht@123!');
    //     $ch             = curl_init();
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json',
    //         'Accept: application/json',
    //         "Authorization: Basic $authorization"
    //     ));
    //     //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    //     curl_setopt($ch, CURLOPT_URL, 'http://api.rankstelecom.com/sms/1/text/single');
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $response = curl_exec($ch);
    //     //var_dump(curl_getinfo($ch));
    //     var_dump($response);
    //     $err = curl_error($ch);
    //     //return $err;
    //
    //     curl_close($ch);
    //
    //     if ($err) {
    //         echo "cURL Error #:" . $err;
    //     } else {
    //         $json = json_decode($response, true);
    //
    //         /*
    //         print_r($json);
    //         echo $json['transactionId'];
    //
    //         $balanceadded=$json['transactionId'];
    //         */
    //         //echo $response;
    //     }
    //
    //     return $response;
    // }
    // http://api.rankstelecom.com/api/v3/sendsms/plain?user=Rupy&password=Kht@123!&SMSText=TEST&GSM=8801710281427&type=longSMS&datacoding=8&fbclid=IwAR0dRYxd--Taz7eXXaFvx6chzjia1UPnDNkrzp3ms9xwL7p6cbqxyUmYYT8
    public function sendSMSs() {

        $datajson = new class{};
        // $datajson = new \stdClass();

        $sms_to_number  = '8801685627791';
        $datajson->from = '8804445600000';
        $smstext        = 'Your Acount has been recharged by TK';
        $datajson->to   = $sms_to_number;
        $datajson->text = $smstext;
        $data_json      = json_encode($datajson);
        $authorization  = base64_encode('Rupy:Kht@123!');
        $ch             = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            // 'Accept: */*',
            "Authorization: Basic $authorization",
            // 'Host: http://api.rankstelecom.com'
        ));
        // curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_URL, 'http://api.rankstelecom.com/api/v3/sendsms/plain');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        var_dump($response);
        $err = curl_error($ch);

        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $json = json_decode($response, true);
        }

        return $response;
    }

    public function sendSMS()
    {

        $datajson = new stdClass();
        $sms_to_number  = '8801685627791';
        $datajson->from = '8804445600001';
        $smstext        = 'weererer';
        $datajson->to   = $sms_to_number;
        $datajson->text = $smstext;
        $data_json      = json_encode($datajson);
        $authorization  = base64_encode('Rupy:Kht@123!');
        $ch             = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json',
            "Authorization: Basic $authorization"
        ));
        // curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_URL, 'http://api.rankstelecom.com/sms/1/text/single');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        //var_dump(curl_getinfo($ch));
        var_dump($response);
        $err = curl_error($ch);
        //return $err;

        // http://api.rankstelecom.com/api/v3/sendsms/plain?user=Rupy&password=Kht@123!&SMSText=TEST&GSM=8801710281427&type=longSMS&datacoding=8

        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $json = json_decode($response, true);

            /*
            print_r($json);
            echo $json['transactionId'];

            $balanceadded=$json['transactionId'];
            */
            //echo $response;
        }

        return $response;

    }
}
