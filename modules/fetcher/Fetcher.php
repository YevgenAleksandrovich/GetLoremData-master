<?php
/**
 * Created by PhpStorm.
 * User: tfrajj
 * Date: 2019-02-11
 * Time: 21:36
 */

class Fetcher
{
  private $url;
  private $response_code;
  private $html;


  public function __construct($url) {
    $this->url = $url;
    $this->html = '';
  }


  public function getUrl() {
    return $this->url;
  }


  public function isOk() {
    return $this->response_code == 200;
  }

  public function load() {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $this->getUrl());
    $this->response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($this->isOk()) {
      $this->html = curl_exec($ch);
    }

    curl_close($ch);
  }
}
