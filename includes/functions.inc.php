<?Php

function sec_session_start() {

  $session_name = 'GUCCI_Mess';
  $secure = SECURE;

  $httponly = true;

  if (ini_set('session.use_only_cookies', 1) === FALSE) {
    header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
    exit();
  }

  $cookieParams = session_get_cookie_params();
  session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

  session_name($session_name);
  session_start();           
  session_regenerate_id();   
}
function getDatetimeNow() {

  $tz_object = new DateTimeZone('Hongkong');

  $datetime = new DateTime();
  $datetime->setTimezone($tz_object);

  return $datetime->format('Y\-m\-d\ h:i:s');
}
function datediff($date1, $date2 )
{
  $diff = abs( strtotime( $date1 ) - strtotime( $date2 ) );

  return sprintf
  (
    "%d Days, %d Hours, %d Mins, %d Seconds",
    intval( $diff / 86400 ),
    intval( ( $diff % 86400 ) / 3600),
    intval( ( $diff / 60 ) % 60 ),
    intval( $diff % 60 )
  );
}

function login($email, $password, $mysqli) {

  $selectAccount = "SELECT user_id, uid, pwd, name FROM userauth WHERE uid = ? LIMIT 1";

  if ($stmt = $mysqli->prepare($selectAccount)) {
    $stmt->bind_param('s', $email);
    if($stmt->execute()){
      $stmt->store_result();
      $stmt->bind_result($user_id, $username, $db_password, $nickname);
      $stmt->fetch();

      if ($stmt->num_rows == 1) {

       if ($password == $db_password) {

         $now = getDatetimeNow();
         $stmt = $mysqli->prepare("UPDATE users SET last_seen = ?, status = 'Online' WHERE user_id = ?");
         $stmt->bind_param('si', $now, $user_id);
         $stmt->execute();

         $user_browser = $_SERVER['HTTP_USER_AGENT'];
         $user_id = preg_replace("/[^0-9]+/", "", $user_id);
         $_SESSION['user_id'] = $user_id;
         $_SESSION['nickname'] = $nickname;
         $_SESSION['username'] = $username;
         $_SESSION['login_string'] = hash('sha512', 
           $db_password . $user_browser);
         return true;
       } else {

         $now = getDatetimeNow();
         $mysqli->query("INSERT INTO login_attempts(user_id, time)
          VALUES ('$user_id', '$now')");
         return false;
       }

     } else{
      return false;
    } 

  } else {
    return false;
  }
}
}
function clean($string) {

 return preg_replace('/[^\p{L}0-9\-]/u', ' ', $string);

}
function signup($email, $password, $name, $mysqli) {

  if ($stmt = $mysqli->prepare("SELECT user_id, uid, pwd FROM userauth WHERE uid = ?")) {
    $stmt->bind_param('s', $email);  
    $stmt->execute();   
    $stmt->store_result();

    $stmt->bind_result($user_id, $username, $db_password);
    $stmt->fetch();

    if (!($stmt->num_rows == 1)) {

      $email = strip_tags($email);
      $password = strip_tags($password);
      $name = strip_tags($name);
      $email = mysqli_escape_string($mysqli, trim($email));
      $password = mysqli_escape_string($mysqli, trim($password));
      $name = mysqli_escape_string($mysqli, trim($name));

      $stmt = $mysqli->prepare('INSERT INTO userauth (uid, pwd, name) VALUES (?, ?, ?)');
      $stmt->bind_param('sss', $email, $password, $name);
      $stmt->execute();

      $stmt = $mysqli->prepare("SELECT user_id FROM userauth WHERE uid = ?");
      $stmt->bind_param('s', $email);  
      $stmt->execute();   
      $stmt->store_result();

      $stmt->bind_result($id);
      $stmt->fetch();
      
      $now = getDatetimeNow();
      $gender = "Male"; 
      $stat = "Offline";
      $ref = "none";
      $userimg = "profile-default.png";
      $stmt = $mysqli->prepare('INSERT INTO users (user_id, user_image, usernick, gender, referrer, last_seen, status) VALUES (?, ?, ?, ?, ?, ?, ?)');
      $stmt->bind_param('issssss', $id, $userimg, $name, $gender, $ref, $now, $stat);
      if($stmt->execute())
      {
        return true;              
      }
      else{
        return false;
      }


      
    } else {

     return false;
   }
 }
}
function time2str($ts) {
  if(!ctype_digit($ts)) {
    $ts = strtotime($ts);
  }
  $diff = time() - $ts;
  if($diff == 0) {
    return 'now';
  } else if($diff > 0) {
    $day_diff = floor($diff / 86400);
    if($day_diff == 0) {
      if($diff < 60) return 'just now';
      if($diff < 120) return '1 minute ago';
      if($diff < 3600) return floor($diff / 60) . ' minutes ago';
      if($diff < 7200) return '1 hour ago';
      if($diff < 86400) return floor($diff / 3600) . ' hours ago';
    }
    if($day_diff == 1) { return 'Yesterday'; }
    if($day_diff < 7) { return $day_diff . ' days ago'; }
    if($day_diff < 31) { return ceil($day_diff / 7) . ' weeks ago'; }
    if($day_diff < 60) { return 'last month'; }
    return date('F Y', $ts);
  } 
}
function encrypt($data, $secret)
{
    //Generate a key from a hash
    $key = md5(utf8_encode($secret), true);

    //Take first 8 bytes of $key and append them to the end of $key.
    $key .= substr($key, 0, 8);

    //Pad for PKCS7
    $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($data);
    $pad = $blockSize - ($len % $blockSize);
    $data .= str_repeat(chr($pad), $pad);

    //Encrypt data
    $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');

    return base64_encode($encData);
}

function decrypt($data, $secret)
{
    //Generate a key from a hash
    $key = md5(utf8_encode($secret), true);

    //Take first 8 bytes of $key and append them to the end of $key.
    $key .= substr($key, 0, 8);

    $data = base64_decode($data);

    $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');

    $block = mcrypt_get_block_size('tripledes', 'ecb');
    $len = strlen($data);
    $pad = ord($data[$len-1]);

    return substr($data, 0, strlen($data) - $pad);
}
?>