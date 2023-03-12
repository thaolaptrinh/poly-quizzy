<?php



function random($string, $int)
{
  return substr(str_shuffle($string), 0, $int);
}


function generate_token()
{

  $token = md5(random('QWERTYUIOPASDGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789', 6) . time());

  return $token;
}


function count_string($data)
{
  return strlen(check_string($data));
}

function myFilter($var)
{
  return ($var == NULL && $var == FALSE && $var == "");
}


function check_email($data)
{
  if (preg_match('/^.+@.+$/', $data, $matches)) {
    return true;
  } else {
    return false;
  }
}

function type_pass($str)
{
  return base64_encode(md5(base64_encode(md5($str))));
}

function check_string($data)
{
  return (trim(htmlspecialchars(addslashes($data))));
}


function get_time()
{
  return date('Y-m-d H:i:s');
}


function get_client_ip()
{
  if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) $ip = getenv("HTTP_CLIENT_IP");
  else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown")) $ip = getenv("HTTP_X_FORWARDED_FOR");
  else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) $ip = getenv("REMOTE_ADDR");
  else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) $ip = $_SERVER['REMOTE_ADDR'];
  else $ip = "unknown";
  return ($ip);
}


function curl_url($url, $arr = [])
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_POSTFIELDS => http_build_query($arr)
  ));


  $resp = curl_exec($curl);
  $result = json_decode($resp, TRUE);
  curl_close($curl);
  return $result;
}


function generate_string($type = 1, $to = 9)
{
  $comb = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  if ($type != 1) {
    $comb = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  }
  $shfl = str_shuffle($comb);
  $pwd = substr($shfl, 0, $to);
  return $pwd;
}



function curl_get($url)
{
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
    CURLOPT_SSL_VERIFYPEER => false,
  ));

  $resp = curl_exec($curl);
  $result = json_decode($resp, true);
  curl_close($curl);
  return $result;
}


function gettime()
{
  return date('d/m/Y H:i:s', time());
}

function my_ip()
{
  if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  } else {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  return check_string($ip_address);
}

function redirect($url)
{
  header("Location: {$url}");
  exit();
}

function getLocation($ip)
{
  if ($ip = '::1') {
    $data = [
      'country' => 'VN'
    ];
    return $data;
  }
  $url = "http://ipinfo.io/" . $ip;
  $location = json_decode(file_get_contents($url), true);
  return $location;
}
