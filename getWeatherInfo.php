<?php
/**
 * Send Weather Info to Your Cell Phone for Free
 *
 * @author ans- <chaoshuimm@gmail.com>
 */


    /**
     * Get weather from json string
     *
     * @param string $content
     * @return string $rst
     */
    function getWeatherInfo($content) {
        $wInfo = json_decode($content)->weatherinfo;
        $city = $wInfo->city;
        // Get temperature from json info
        $temp1 = ($wInfo->temp1).trim();
        $temp2 = $wInfo->temp2;
        $temp3 = $wInfo->temp3;
        $temp4 = $wInfo->temp4;
        $temp5 = $wInfo->temp5;

        $img_title1 = $wInfo->img_title1;
        $img_title2 = $wInfo->img_title2;
        $img_title3 = $wInfo->img_title3;
        $img_title4 = $wInfo->img_title4;
        $img_title5 = $wInfo->img_title5;
        $img_title6 = $wInfo->img_title6;
        $img_title7 = $wInfo->img_title7;
        $img_title8 = $wInfo->img_title8;
        $img_title9 = $wInfo->img_title9;

        // day of week
        $day = (int)date('w');
        $week = array('日', '一', '二', '三', '四', '五', '六'); 

        $rst = $city . ":周" . $week[$day] . ": " . 
            substr($temp1, 0, strpos($temp1, "~")) . "(夜间)," . 
            $wInfo->img_title1 . "周" . $week[($day + 1) % 7] . ": " . 
            substr($temp1, strpos($temp1, "~") + 1) . "~" . 
            substr($temp2, 0, strpos($temp2, "~")) . "," . 
            ($img_title2 == $img_title3 ? $img_title2 : 
            ($img_title2 . "转" . $img_title3)) . "周" . 
            $week[($day + 2) % 7] . ": " . 
            substr($temp2, strpos($temp2, "~") + 1) . "~" . 
            substr($temp3, 0, strpos($temp3, "~")) . "," . 
            ($img_title4 == $img_title5 ? $img_title4 : 
            ($img_title4 . "转" . $img_title5)) . "周" . 
            $week[($day + 3) % 7] . ": " . 
            substr($temp3, strpos($temp3, "~") + 1) . "~" . 
            substr($temp4, 0, strpos($temp4, "~")) . "," . 
            ($img_title6 == $img_title7 ? $img_title6 : 
            ($img_title6 . "转" . $img_title7)) . "周" . 
            $week[($day + 4) % 7] . ": " . 
            substr($temp4, strpos($temp4, "~") + 1) . "~" . 
            substr($temp5, 0, strpos($temp5, "~")) . "," . 
            ($img_title8 == $img_title9 ? $img_title8 : 
            ($img_title8 . "转" . $img_title9));

        return $rst;
    }

?>
