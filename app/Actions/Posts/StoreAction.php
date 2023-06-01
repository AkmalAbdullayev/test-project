<?php

namespace App\Actions\Posts;

use App\Facades\SendSms;
use App\Mail\PostCreated;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class StoreAction {
    public function handle(array $data): void
    {
        Post::query()->create($data);

//        $data = [
//            'receivers' => ['cell_numbers'],
//            'message' => 'Post Created'
//        ];

        // after that we can implement our mail and sms services, or we can implement our services in Observers also
//        Mail::to('receiver')->send(new PostCreated());

//        SendSms::send('receiver', ['message' => 'Post Created']);
//        SendSms::bulk($data);
    }
}
