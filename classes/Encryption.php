<?php
//AES encrpyt/decrypt helper class
class Encryption 
{
    public static function encrypt($data, $key) 
    {
        return openssl_encrypt($data, 'AES-128-ECB', $key);
    }

    public static function decrypt($data, $key) 
    {
        return openssl_decrypt($data, 'AES-128-ECB', $key);
    }
}
?>
