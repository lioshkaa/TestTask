<?php

namespace App\Enum;

enum DayEnum:int
{
    case MONDAY =1;
    case TUESDAY =2;
    case WEDNESDAY = 3;
    case THURSDAY =4;
    case FRIDAY = 5;

    public function status():string
    {
        return match ($this){
            self::MONDAY =>'Понедельник',
            self::TUESDAY =>'Вторник',
            self::WEDNESDAY=>'Среда',
            self::THURSDAY =>'Четверг',
            self::FRIDAY => 'Пятница'
        };
}
    public function statuses():array
    {
        foreach (self::cases() as $val)
            $result[$val->value] = $val->status();
        return $result ?? [];
    }
}
