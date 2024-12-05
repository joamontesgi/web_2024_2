<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;


class NotificationController extends Controller
{
    public function sendSmsNotification()
    {
        // Obtener las credenciales de Twilio desde el archivo .env
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilio = new Client($sid, $token);

        $destino = '+573502899314';
        $mensaje = 'Mensaje enviado';

        // Enviar el mensaje de texto
        $twilio->messages->create(
            $destino,
            [
                'from' => env('TWILIO_PHONE_NUMBER'),
                'body' => $mensaje
            ]
        );

        return response()->json([
            'message' => 'Mensaje enviado correctamente'
        ]);
    }
}
