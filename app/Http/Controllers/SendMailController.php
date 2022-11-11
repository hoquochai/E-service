<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Http\Service\Mail\SendMailService;
use Illuminate\Support\Facades\Log;

class SendMailController extends Controller
{
    /**
     * @param SendMailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function send(SendMailRequest $request)
    {
        $data = $request->all();

        try {
            $provider = new SendMailService();
            $sendResult = $provider->send(
                [$data['receiver'] => $data['receiver']],
                $data['subject'],
                $data['content']
            );

            if (!$sendResult) {
                $provider = new SendMailService(config('mail_customize.backup_mailer'));
                $sendResult = $provider->send(
                    [$data['receiver'] => $data['receiver']],
                    $data['subject'],
                    $data['content']
                );
            }

            return response()->json(['status' => $sendResult]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
