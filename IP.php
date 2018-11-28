<?php
/* @brief 

   Get IP Address.

   @param_out : IP Address
   @param_in  : IP type
   @return    : IP address */
   
function getClientIP($type) {
    /* Recommend to save all these into DB. */
    foreach (array( 'HTTP_CLIENT_IP',
                    'HTTP_X_FORWARDED_FOR',
                    'HTTP_X_FORWARDED',
                    'HTTP_X_CLUSTER_CLIENT_IP',
                    'HTTP_FORWARDED_FOR',
                    'HTTP_FORWARDED',
                    'REMOTE_ADDR') as $key) {
        $IP[$key] = $_SERVER[$key];
        
        if ($type == $key)
            return $IP[$key];
    }
    /* Get the IP in easy way. */
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $IP = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $IP= $_SERVER['REMOTE_ADDR'];
    }
    return $IP;
}
?>