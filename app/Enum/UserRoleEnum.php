<?php

namespace App\Enum;
enum UserRoleEnum: int
{
    case ADMIN = 1;
    case USER = 2;
    case CLIENT = 3;



    public function status():string
    {
        return match ($this){
            self::ADMIN =>'admin',
            self::USER =>'user',
            self::CLIENT=>'client'
        };
    }
    public function statuses():array
    {
        foreach (self::cases() as $val)
            $result[$val->value] = $val->status();
        return $result ?? [];
    }

}
