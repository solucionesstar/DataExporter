<?php
namespace SolStar;

class DataExporter {

  private $_data = null;
  private $_error = null;

  public $url = '';

  public function getData() {
    return $this->_data;
  }

  public function getError() {
    return $this->_error;
  }

  public function tryProcess() {
    $result = false;

    if (!empty($this->url)) {
      $curl = new \Curl\Curl();
      $curl->get($this->url);
      if ($curl->error) {
        $this->_error = $curl->errorCode . ': ' . $curl->errorMessage;
      }
      else {
        $response = $curl->rawResponse;
        if (!empty($response)) {
          $this->_data = json_decode($response);
          $result = true;
        }
      }
    }
    return $result;
  }
}
