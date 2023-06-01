<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SendSms extends Facade {
    protected static function getFacadeAccessor(): string
    {
        // according to using SMS services we can rename out facade accessor, for example, twilio

        return 'sms';
    }
}
