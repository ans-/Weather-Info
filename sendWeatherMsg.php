<?php
/**
 * Send Weather Info to Your Cell Phone for Free
 *
 * @author ans- <chaoshuimm@gmail.com>
 */

    // Use SAE PHP API to fetch extern data
    $f = new SaeFetchurl();
    $citycode = "101050101"
    $url_harbin = "http://m.weather.com.cn/data/" . $citycode ".html";

    // Store the weather innfo of Harbin in var $content
    $content = $f->fetch($url_harbin);
    if($f->errno() == 0)  
        echo $content;
    else 
        echo $f->errmsg();

    require './getWeatherInfo.php';
    $weatherInfo = getWeatherInfo($content);


    // SMS using CMCC Fetion
    require './lib/PHPFetion.php';

    $fetion = new PHPFetion('your cell phone number', 'your fetion password');
    // Send weather info to cell phone
    $ret = $fetion->send('your cell phone number', $weatherInfo);

    print_r($ret)


       

?>
