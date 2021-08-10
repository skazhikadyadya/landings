<?php

    $country = 'ro';
    $offer_id = '169';
    $token = 'czbfA7TY8OTvbKYaU68CUHzm0092TeUc';
    $url = "http://api.plado.market/lead/create";
    $ty_header = "Thank you!";
    $ty_text = "Thank you for your order!";

    $toSend = [];
    $toSend['name'] = stripslashes($_POST['name']);
    $toSend['phone'] = stripslashes($_POST['phone']);
    $toSend['country'] = $country;
    $toSend['offer_id'] = $offer_id;

    if ( !sendData($toSend, $url, $token) )
    {
    }


    function sendData($toSend, $url, $token)
    {
        $process = curl_init();
        curl_setopt($process, CURLOPT_HTTPHEADER, array("Content-type: application/json", "Authorization: Bearer " . $token));
        curl_setopt($process, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)");
        curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($process, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($process, CURLOPT_TIMEOUT, 20);
        curl_setopt($process, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($process, CURLOPT_POST, true);
        curl_setopt($process, CURLOPT_POSTFIELDS, json_encode($toSend));
        curl_setopt($process, CURLOPT_URL, $url);
        $return = curl_exec($process);
        curl_close($process);
    }

?>
<html lang="ru">
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo stripslashes($ty_header); ?></title>
</head>
<body>

    <h1><?php echo stripslashes($ty_header); ?></h1>
    <p><?php echo stripslashes($ty_text); ?></p>

</body>
</html>