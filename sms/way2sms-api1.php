<?php
class WAY2SMSClient
{
  /*------------ Way2sms code by www.Howi.In -----
   |  Find More Scripts @ www.Howi.in
   *--------------------------------------------*/
    var $curl;
    var $timeout = 30;
    var $jstoken;
    var $way2smsHost;
    var $refurl;

    function login($username, $password)
    {
      /*------------ Way2sms code by www.Howi.In -----
       |  Find More Scripts @ www.Howi.in
       *--------------------------------------------*/
        $this->curl = curl_init();
        $uid = urlencode($username);
        $pwd = urlencode($password);

        // Go where the server takes you :P
        curl_setopt($this->curl, CURLOPT_URL, "http://way2sms.com");
        curl_setopt($this->curl, CURLOPT_HEADER, true);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, TRUE);
        $a = curl_exec($this->curl);
        if (preg_match('#Location: (.*)#', $a, $r))
            $this->way2smsHost = trim($r[1]);

        // Setup for login
        curl_setopt($this->curl, CURLOPT_URL, $this->way2smsHost . "Login1.action");
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, "username=" . $uid . "&password=" . $pwd . "&button=Login");
        curl_setopt($this->curl, CURLOPT_COOKIESESSION, 1);
        curl_setopt($this->curl, CURLOPT_COOKIEFILE, "cookie_way2sms");
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->curl, CURLOPT_MAXREDIRS, 20);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36");
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($this->curl, CURLOPT_REFERER, $this->way2smsHost);
        $text = curl_exec($this->curl);

        // Check if any error occured
        if (curl_errno($this->curl))
            return "access error : " . curl_error($this->curl);

        // Check for proper login
        $pos = stripos(curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL), "main.action");
        if ($pos === "FALSE" || $pos == 0 || $pos == "")
            return "invalid login";

        // Set the home page from where we can send message
        $this->refurl = curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL);
        /*$newurl = str_replace("ebrdg.action?id=", "main.action?section=s&Token=", $this->refurl);
        curl_setopt($this->curl, CURLOPT_URL, $newurl);*/

        // Extract the token from the URL
        $tokenLocation = strpos($this->refurl, "Token");
        $this->jstoken = substr($this->refurl, $tokenLocation + 6, 37);
        //Go to the homepage
        //$text = curl_exec($this->curl);

        return true;
    }

    function send($phone, $msg)
    {
        $result = array();

        // Check the message
        if (trim($msg) == "" || strlen($msg) == 0)
            return "invalid message";

        // Take only the first 140 characters of the message
        $msg = substr($msg, 0, 140);
        // Store the numbers from the string to an array
        $pharr = explode(",", $phone);

        // Send SMS to each number
        foreach ($pharr as $p) {
            if (strlen($p) != 10 || !is_numeric($p) || strpos($p, ".") != false) {
                $result[] = array('phone' => $p, 'msg' => $msg, 'result' => "invalid number");
                continue;
            }

            // Setup to send SMS
            curl_setopt($this->curl, CURLOPT_URL, $this->way2smsHost . 'smstoss.action');
            curl_setopt($this->curl, CURLOPT_REFERER, curl_getinfo($this->curl, CURLINFO_EFFECTIVE_URL));
            curl_setopt($this->curl, CURLOPT_POST, 1);

            curl_setopt($this->curl, CURLOPT_POSTFIELDS, "ssaction=ss&Token=" . $this->jstoken . "&mobile=" . $p . "&message=" . $msg . "&button=Login");
            $contents = curl_exec($this->curl);

            //Check Message Status
            $pos = strpos($contents, 'Message has been submitted successfully');
            $res = ($pos !== false) ? true : false;
            $result[] = array('phone' => $p, 'msg' => $msg, 'result' => $res);
        }
        return $result;
    }

    function logout()
    {
        curl_setopt($this->curl, CURLOPT_URL, $this->way2smsHost . "LogOut");
        curl_setopt($this->curl, CURLOPT_REFERER, $this->refurl);
        $text = curl_exec($this->curl);
        curl_close($this->curl);
    }

}

function sendWay2SMS($uid, $pwd, $phone, $msg)
{
	
	
  /*------------ Way2sms code by www.Howi.In -----
   |  Find More Scripts @ www.Howi.in
   *--------------------------------------------*/
    if(empty($uid))
    {
      echo "Username is Wrong";
    }
    else if(empty($pwd))
    {
      echo "Password is Wrong";
    }
    else if(empty($phone))
    {
      echo "Enter Recevier Phone";
    }
    else if(empty($msg))
    {
      echo "Enter a Message";
    }
    else{
    $client = new WAY2SMSClient();
    $client->login($uid, $pwd);
    $result = $client->send($phone, $msg);
    $client->logout();
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Message Send Successfully');
    </SCRIPT>");
	
	header('location:sms/verifyotp1.php');
  }
}
