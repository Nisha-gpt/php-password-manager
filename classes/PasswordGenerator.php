<?php
//Generates password with character control
class PasswordGenerator 
{
    public static function generate($length, $upper, $lower, $numbers, $specials) 
    {
        $password = [];
        $chars = [
            'upper' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'lower' => 'abcdefghijklmnopqrstuvwxyz',
            'numbers' => '0123456789',
            'specials' => '!@#$%^&*()-_=+<>?'
        ];

        foreach (['upper' => $upper, 'lower' => $lower, 'numbers' => $numbers, 'specials' => $specials] as $type => $count) 
        {
            for ($i = 0; $i < $count; $i++) 
            {
                $password[] = $chars[$type][rand(0, strlen($chars[$type]) - 1)];
            }
        }

        while (count($password) < $length) 
        {
            $all = implode('', $chars);
            $password[] = $all[rand(0, strlen($all) - 1)];
        }

        shuffle($password);
        return implode('', $password);
    }
}
?>
