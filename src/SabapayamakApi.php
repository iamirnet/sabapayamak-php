<?php

namespace Sabapayamak;

use Sabapayamak\Exceptions\ApiException;
use Sabapayamak\Exceptions\HttpException;
use Sabapayamak\Exceptions\RuntimeException;
use Sabapayamak\Enums\ApiLogs ;
use Sabapayamak\Enums\General;

class SabapayamakApi
{
    const VERSION = "1.0.0";
    public function __construct($apiPath)
    {
        if (!extension_loaded('curl')) {
            die('cURL library is not loaded');
            exit;
        }
        if (is_null($apiPath)) {
            die('apiPath is empty');
            exit;
        }
        $this->apiPath = trim($apiPath);
    }   

	
    protected function get_path($method)
    {
        if($method == "getToken")
        {
            return sprintf($this->apiPath,"/api/v1/user/authenticate");
        }
        if($method == "getCredit")
        {
            return sprintf($this->apiPath,"/api/v1/credit");
        }
        if($method == "getCreditByDate")
        {
            return sprintf($this->apiPath,"/api/v1/credit");
        }
        if($method == "getCreditByCount")
        {
            return sprintf($this->apiPath,"/api/v1/credit");
        }
        if($method == "getCreditForSendSms")
        {
            return sprintf($this->apiPath,"/api/v1/credit/send-sms");
        }
        if($method == "getCreditForRecivedSms")
        {
            return sprintf($this->apiPath,"/api/v1/credit/recived");
        }
        if($method == "getCreditForCharge")
        {
            return sprintf($this->apiPath,"/api/v1/credit/charge");
        }
        if($method == "getCreditForMoneyBack")
        {
            return sprintf($this->apiPath,"/api/v1/credit/money-back");
        }
        if($method == "getMessagesByDate")
        {
            return sprintf($this->apiPath,"/api/v1/credit/messages");
        }
        if($method == "getMessageById")
        {
            return sprintf($this->apiPath,"/api/v1/credit/messages");
        }
        if($method == "getMessagesByNumber")
        {
            return sprintf($this->apiPath,"/api/v1/credit/messages/number");
        }
        if($method == "postMessage")
        {
            return sprintf($this->apiPath,"/api/v1/messages");
        }
        if($method == "getDeliveriesById")
        {
            return sprintf($this->apiPath,"/api/v1//api/v1/deliveries");
        }
        if($method == "getRecivedMessageByDate")
        {
            return sprintf($this->apiPath,"/api/v1/recived-messages");
        }
        if($method == "getRecivedMessageByNumber")
        {
            return sprintf($this->apiPath,"/api/v1/recived-messages");
        }
        if($method == "getUnreadRecivedMessageByNumber")
        {
            return sprintf($this->apiPath,"/api/v1/recived-messages");
        }
        if($method == "getRecivedMessageByVNumber")
        {
            return sprintf($this->apiPath,"/api/v1/recived-messages/virtaul-number");
        }
        if($method == "getUnreadRecivedMessageByVNumber")
        {
            return sprintf($this->apiPath,"/api/v1/recived-messages/virtaul-number");
        }
        if($method == "getUnreadRecivedMessage")
        {
            return sprintf($this->apiPath,"/api/v1/recived-messages/unread");
        }

        
    }
	protected function PostWithToken($url, $data,$token)
    {        
        try{
            $authorization = "Authorization: Bearer ".$token;
            $headers       = array(
                'Accept: application/json',
                'Content-Type: application/json',
                'charset: utf-8',
                $authorization
            );
            $fields_string = "";
            if (!is_null($data)) {
                $fields_string = http_build_query($data);
            }
            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $url);
            curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $fields_string);
            
            $response     = curl_exec($handle);
            $code         = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            $content_type = curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
            $curl_errno   = curl_errno($handle);
            $curl_error   = curl_error($handle);
            if ($curl_errno) {
                throw new Exception($curl_error);
            }
            $json_response = json_decode($response);
            if(is_null($json_response)){
                throw new Exception("Error happend!");
            } else {
                return $json_response->entries;
            }
        }
        catch(Exception $e) {
            return $e->getMessage();
          }  
    }
    protected function Post($url, $data)
    {        
        try{
            $authorization = "Authorization: Bearer ".$token;
            $headers       = array(
                'Accept: application/json',
                'Content-Type: application/json',
                'charset: utf-8',
                $authorization
            );
            $fields_string = "";
            if (!is_null($data)) {
                $fields_string = http_build_query($data);
            }
            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $url);
            curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($handle, CURLOPT_POST, true);
            curl_setopt($handle, CURLOPT_POSTFIELDS, $fields_string);
            
            $response     = curl_exec($handle);
            $code         = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            $content_type = curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
            $curl_errno   = curl_errno($handle);
            $curl_error   = curl_error($handle);
            if ($curl_errno) {
                throw new Exception($curl_error);
            }
            $json_response = json_decode($response);
            if(is_null($json_response)){
                throw new Exception("Error happend!");
            } else {
                return $json_response->entries;
            }
        }
        catch(Exception $e) {
            return $e->getMessage();
          }  
    }
    protected function GetWithToken($url,$token)
    {        
        try{
            $headers       = array(
                'Accept: application/json',
                'Content-Type: application/json',
                'charset: utf-8'
            );
            $handle = curl_init();
            curl_setopt($handle, CURLOPT_URL, $url);
            curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);

            $response     = curl_exec($handle);
            $code         = curl_getinfo($handle, CURLINFO_HTTP_CODE);
            $content_type = curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
            $curl_errno   = curl_errno($handle);
            $curl_error   = curl_error($handle);
            if ($curl_errno) {
                throw new Exception($curl_error);
            }
            $json_response = json_decode($response);
            if(is_null($json_response)){
                throw new Exception("Error happend!");
            } else {
                return $json_response->entries;
            }
        }
        catch(Exception $e) {
            return $e->getMessage();
          }  
    }



    public function GetToken($username, $password, $virtualnumber, $validday){
        $path   = $this->get_path("getToken");
        $params = array(
            "username" => $username,
            "password" => $password,
            "virtualnumber" => $virtualnumber,
            "validday" => $validday
        );

        return $this->post($path, $params);
    }
    public function GetCredit($token){
        $path   = $this->get_path("getCredit");
        return $this->GetWithToken($path, $token);
    }
    public function GetCreditByDate($startdate,$enddate,$token){
        $path   = $this->get_path("getCreditByDate")."?StartDate=".$startdate."&EndDate=".$enddate;
        return $this->GetWithToken($path, $token);
    }
    public function GetCreditByCount($count,$token){
        $path   = $this->get_path("getCreditByCount")."/".$count;
        return $this->GetWithToken($path, $token);
    }
    public function GetCreditForSendSms($count,$token){
        $path   = $this->get_path("getCreditForSendSms")."/".$count;
        return $this->GetWithToken($path, $token);
    }
    public function GetCreditForRecivedSms($count,$token){
        $path   = $this->get_path("getCreditForRecivedSms")."/".$count;
        return $this->GetWithToken($path, $token);
    }
    public function GetCreditForCharge($count,$token){
        $path   = $this->get_path("getCreditForCharge")."/".$count;
        return $this->GetWithToken($path, $token);
    }
    public function GetCreditForMoneyBack($count,$token){
        $path   = $this->get_path("getCreditForMoneyBack")."/".$count;
        return $this->GetWithToken($path, $token);
    }
    public function GetMessagesByDate($startdate,$enddate,$token){
        $path   = $this->get_path("getMessagesByDate")."?StartDate=".$startdate."&EndDate=".$enddate;
        return $this->GetWithToken($path, $token);
    }
    public function GetMessageById($id,$token){
        $path   = $this->get_path("getMessageById")."/".$id;
        return $this->GetWithToken($path, $token);
    }

    public function GetMessageByNumber($number,$token){
        $path   = $this->get_path("getMessagesByNumber")."/".$number;
        return $this->GetWithToken($path, $token);
    }
    public function SendMessage($text,$numbers){
        $path   = $this->get_path("postMessage");
        $params = array(
            "text" => $text,
            "numbers" => $numbers
        );
       return $this->PostWithToken($path, $params, $token);

    }
    public function GetDeliveriesById($id,$token){
        $path   = $this->get_path("getDeliveriesById")."/".$id;
        return $this->GetWithToken($path, $token);
    }
    public function GetRecivedMessageByDate($startdate,$enddate,$token){
        $path   = $this->get_path("getRecivedMessageByDate")."?StartDate=".$startdate."&EndDate=".$enddate;
        return $this->GetWithToken($path, $token);
    }
    public function GetRecivedMessageByNumber($number,$token){
        $path   = $this->get_path("getRecivedMessageByNumber")."/".$number;
        return $this->GetWithToken($path, $token);
    }
    public function GetUnreadRecivedMessageByNumber($number,$token){
        $path   = $this->get_path("getUnreadRecivedMessageByNumber")."/".$number."/unread";
        return $this->GetWithToken($path, $token);
    }
    public function GetRecivedMessageByVNumber($vnumber,$token){
        $path   = $this->get_path("getRecivedMessageByVNumber")."/".$vnumber;
        return $this->GetWithToken($path, $token);
    }
    public function GetUnreadRecivedMessageByVNumber($vnumber,$token){
        $path   = $this->get_path("getUnreadRecivedMessageByVNumber")."/".$nvumber."/unread";
        return $this->GetWithToken($path, $token);
    }
    public function GetUnreadRecivedMessage($token){
        $path   = $this->get_path("getUnreadRecivedMessage");
        return $this->GetWithToken($path, $token);
    }
}
?>