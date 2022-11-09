<?php

namespace App\Http\Controllers;

use App\Http\Service\Mail\MailGun\MailGunService;
use App\Http\Service\Mail\SendGrid\SendGridService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SendMailController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->get('receiver','subject', 'content');

        try {
            $provider = new SendGridService();
            $sendResult = $provider->send([$data['receiver'] => $data['receiver']], $data['subject'], $data['content']);

            if (!$sendResult) {
                $provider = new MailGunService();
                $sendResult = $provider->send([$data['receiver'] => $data['receiver']], $data['subject'], $data['content']);
            }

            return response()->json(['status' => $sendResult]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['status' => false]);
        }
    }
}
