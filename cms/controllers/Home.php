<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->helper('string');


  }

  function index()
  {

    $this->load->view("home");

  }


  public function registercheck(){

    // POST ile gelen veri
    // $device_uid = $this->input->post("device_uid");
    // $device_appid = $this->input->post("device_appid");
    // $device_lang = $this->input->post("device_lang");
    // $device_os = $this->input->post("device_os");

    // Manuel Veri
    $device_uid = "ek8829172638493";
    $device_appid = "1872638";
    $device_lang = "tr";
    $device_os = "ios";
    $device_regdate = date('Y-m-d H:i:s');

    $device_ctoken = random_string('alnum', 16);
    $device_substatus = "free";

    $regcheck = $this->Home_model->regCheck($device_uid);

    if ($regcheck) {
      $response['error'] = "002";
      $response['message'] = "already registered";
      echo json_encode($response);
    } else {

      $newReg = $this->Home_model->newReg($device_uid, $device_appid, $device_lang, $device_os, $device_regdate, $device_ctoken, $device_substatus);

      if ($newReg == true) {
        $response["error"] = "001";
        $response["message"] = "Device ".$device_uid." has registered. Return to home.";
        echo json_encode($response);

      }

    }

  }


  // store doğrulaması varsayımı
  function verifyrecnum($num){
    if ($num % 2 == 0) {
      return true;
    } else { return false; }
  }

  public function purchase(){

    $device_ctoken = "IL67fOBgD22EV3dq";
    $device_receiptnum = rand(0, 999999999);
    $subscription_appid = "1872638";

    $verifyprocess = $this->verifyrecnum($device_receiptnum);
    if ($verifyprocess) {

      // daha önce aynı paket satın alınmış mı kontrolü. Tekrar abonelikler satırına yeni giriş olmaması için yapıldı.
      $subCheck = $this->Home_model->SubCheck($device_ctoken);
      if ($subCheck['subscription_status'] == "continues") {
        $response["message"] = "false";
        $response["status"] = "satin alma daha once yapildi. Receipt Number:".$device_receiptnum;
        echo json_encode($response);
      } else {
        // 1 haftalık abonelik aldığını varsayıyoruz
        $expire_date = date('Y-m-d H:i:s', time() + 604800);

        $sub_success = $this->Home_model->SubSuccess($device_ctoken, $expire_date, $subscription_appid);
        $update_device_status = $this->Home_model->DeviceStatusUpdate($device_ctoken);
        if ($sub_success) {
          $response["message"] = "OK";
          $response["status"] = "satin alma islemi basarili. Receipt Number:".$device_receiptnum;
          echo json_encode($response);
        }
      }

    } else {
      $response["message"] = "false";
      $response["status"] = "satin alma islemi basarisiz Receipt Number:".$device_receiptnum;
      echo json_encode($response);
    }


  }


  public function checkSub(){

    $device_ctoken = "IL67fOBgDwnEV3dq";
    $subCheck = $this->Home_model->SubCheck($device_ctoken);

    if ($subCheck['subscription_status'] == "continues") {
      $response["message"] = "003";
      $response["status"] = "Abonelik Aktif";
      $response["expire_date"] = "Bitis Tarihi: " .$subCheck['subscription_expire_date'];
      echo json_encode($response);
    } else {
      $response["message"] = "004";
      $response["status"] = "Abonelik Pasif";
      echo json_encode($response);
    }

  }


  public function worker(){

    // Worker her çağrıldığında süresi geçen abonelikleri expired olarak işaretleyecek ve devices kısmında da status değerini free olarak güncelleyecek
    $updateSubStatus = $this->Home_model->updateSubStatus();

    $data["subs"] = $this->Home_model->getSubscription();

    $this->load->view("worker", $data);

  }

  public function callback(){

    // bildirimi gerçekleşmemiş logları çekiyoruz
    $logs = $this->Home_model->getLogsforEvent();

    $response["logs"] = $logs;
    echo json_encode($response);

  }


  public function stats(){

    $totalDevice = $this->Home_model->totalDevice();
    $totalDeviceToday = $this->Home_model->totalDeviceToday();
    $totalPurchaseToday = $this->Home_model->totalPurchaseToday();
    $totalExpiredToday = $this->Home_model->totalExpiredToday();
    $totalDeviceIos = $this->Home_model->totalOs('ios');
    $totalDeviceAndroid = $this->Home_model->totalOs('android');

    $response["totalDevice"] = $totalDevice;
    $response["totalDeviceToday"] = $totalDeviceToday;
    $response["totalDeviceIos"] = $totalDeviceIos;
    $response["totalDeviceAndroid"] = $totalDeviceAndroid;
    $response["totalPurchaseToday"] = $totalPurchaseToday;
    $response["totalExpiredToday"] = $totalExpiredToday;
    echo json_encode($response);

  }




}
