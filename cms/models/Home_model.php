<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }


  public function regCheck($device_uid){
    $query = $this->db->where("device_uid", $device_uid);
    $query = $this->db->get("devices");
    return $query->row_array();
  }


  public function newReg($device_uid, $device_appid, $device_lang, $device_os, $device_regdate, $device_ctoken, $device_substatus){
    $data = array(
      'device_uid' => $device_uid,
      'device_appid' => $device_appid,
      'device_lang' => $device_lang,
      'device_os' => $device_os,
      'device_regdate' => $device_regdate,
      'device_ctoken' => $device_ctoken,
      'device_substatus' => $device_substatus
    );

    $query = $this->db->insert("devices", $data);
    return true;
  }


  public function subCheck($device_ctoken){
    $query = $this->db->where("subscription_device_token", $device_ctoken);
    $query = $this->db->get("subscription");
    return $query->row_array();
  }



  public function SubSuccess($device_ctoken, $expire_date, $subscription_appid){
    $data = array(
      'subscription_device_token' => $device_ctoken,
      'subscription_expire_date' => $expire_date,
      'subscription_appid' => $subscription_appid,
      'subscription_status' => "continues"
    );
    $status = "continues";

    $query = $this->db->insert("subscription", $data);
    $this->Home_model->setLog($subscription_appid, $device_ctoken, $status);

    return true;
  }


  public function DeviceStatusUpdate($device_ctoken){
    $data = array(
      'device_substatus' => "7days"
    );

    $query = $this->db->where("device_ctoken", $device_ctoken);
    $query = $this->db->update("devices", $data);
    return true;
  }


  public function getSubscription(){
    $query = $this->db->get("subscription");
    return $query->result_array();
  }


  public function updateSubStatus(){
    $data = array(
      'subscription_status' => "expired"
    );
    $status = "expired";

    $now = date("Y-m-d H:i:s");

    $query = $this->db->where("subscription_expire_date <= ", $now );
    $query = $this->db->update("subscription", $data);

    // $this->Home_model->setLog();

    return true;
  }

  public function setLog($appid, $tokenid, $status){
    $data = array(
      'log_date' => date("Y-m-d H:i:s"),
      'log_appid' => $appid,
      'log_tokenid' => $tokenid,
      'log_status' => $status
    );

    $query = $this->db->insert("log", $data);
    return true;
  }


  public function getLogsforEvent(){
    $query = $this->db->where("log_callback", "0");
    $query = $this->db->get("log");
    return $query->result_array();
  }


  public function totalDeviceToday(){
    $tomorrow = date('Y-m-d H:i:s', time() + 86400);
    $yesterday = date('Y-m-d H:i:s', time() - 86400);

    $query = $this->db->where("device_regdate >= ", $yesterday );
    $query = $this->db->where("device_regdate <= ", $tomorrow );
    $query = $this->db->get("devices");
    return $query->num_rows();
  }

  public function totalPurchaseToday(){
    $tomorrow = date('Y-m-d H:i:s', time() + 86400);
    $yesterday = date('Y-m-d H:i:s', time() - 86400);

    $query = $this->db->where("subscription_buydate >= ", $yesterday );
    $query = $this->db->where("subscription_buydate <= ", $tomorrow );
    $query = $this->db->get("subscription");
    return $query->num_rows();
  }

  public function totalExpiredToday(){
    $tomorrow = date('Y-m-d H:i:s', time() + 86400);
    $yesterday = date('Y-m-d H:i:s', time() - 86400);

    $query = $this->db->where("subscription_expire_date >= ", $yesterday );
    $query = $this->db->where("subscription_expire_date <= ", $tomorrow );
    $query = $this->db->get("subscription");
    return $query->num_rows();
  }


  public function totalDevice(){ $query = $this->db->get("devices"); return $query->num_rows(); }
  public function totalOs($os){ $query = $this->db->where("device_os", $os);  $query = $this->db->get("devices"); return $query->num_rows(); }



}
