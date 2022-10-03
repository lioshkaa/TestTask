<?php

namespace App\Enum;

enum ReceptionEnum:int
{

    case Reception_DONE = 1;
    case Reception_NOT_DONE = 2;
    case Client_NOT_DONE = 3;

    public function status(): string
    {
        return match ($this) {
            self::Reception_DONE => 'Прием состоялся',
            self::Reception_NOT_DONE => 'Прием не состоялся',
            self::Client_NOT_DONE => 'Клиент не пришел',
        };

    }
}
