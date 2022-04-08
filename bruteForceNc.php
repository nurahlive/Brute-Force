<?php
namespace Attack {
    class bruteForce{
        function bruteForce($url,$postFieldList,$controlerrorurl){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postFieldList));
            $server_output = curl_exec($ch);
            $curlinfo= curl_getinfo($ch);
            $errorUrlControl=trim(str_replace($url,'',$curlinfo['url']));
            if($errorUrlControl===$controlerrorurl){
                return false;
            }else{
               return true;
            }
            curl_close($ch);
        }
    }



}
?>