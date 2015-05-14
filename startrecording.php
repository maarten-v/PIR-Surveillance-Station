<pre>
<?php
$user = "<username>";
$password = "<password>";
$cameraid = "<camera id>";
//authentification
$response = get_web_page("http://diskstation:5000/webapi/auth.cgi?api=SYNO.API.Auth&method=Login&version=2&account=". $user."&passwd=".$password."&session=SurveillanceStation&format=sid");
//echo $response; 
$resArr = array();
$resArr = ($response);
$resArr = json_decode($response,true);

//sid in the array
$sid=array();
$sid=$resArr[data];
//echo $sid[sid];

//Request API info:
//http://diskstation:5000/webapi/query.cgi?api=SYNO.API.Info&method=Query&version=1&query=SYNO.SurveillanceStation.ExternalRecording

//send Start record
$url="http://diskstation:5000/webapi/_______________________________________________________entry.cgi?api=SYNO.SurveillanceStation.ExternalRecording&method=Record&version=2&cameraId=". $cameraid. "&_sid=".$sid[sid]."&action=";
//echo 'url: '.$url.'<br />';
echo 'response:<br />';
$response = get_web_page($url.'start');
echo $response.'<br />'; 
sleep(10);
echo 'response:<br />';
$response = get_web_page($url.'stop');
echo $response; 

function get_web_page($url) {
      $options = array (CURLOPT_RETURNTRANSFER => true, // return web page
    CURLOPT_HEADER => false, // don't return headers
    CURLOPT_FOLLOWLOCATION => true, // follow redirects
    CURLOPT_ENCODING => "", // handle compressed
    CURLOPT_USERAGENT => "test", // who am i
    CURLOPT_AUTOREFERER => true, // set referer on redirect
    CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
    CURLOPT_TIMEOUT => 120, // timeout on response
    CURLOPT_MAXREDIRS => 10 ); // stop after 10 redirects


    $ch = curl_init ( $url );
    curl_setopt_array ( $ch, $options );
    $content = curl_exec ( $ch );
    $err = curl_errno ( $ch );
    $errmsg = curl_error ( $ch );
    $header = curl_getinfo ( $ch );
    $httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

    curl_close ( $ch );

    $header ['errno'] = $err;
    $header ['errmsg'] = $errmsg;
    $header ['content'] = $content;
    return $header ['content'];
} 
?>
</pre>
