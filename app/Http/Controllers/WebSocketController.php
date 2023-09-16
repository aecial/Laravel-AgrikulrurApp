<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ValidationService;
use Ratchet\ConnectionInterface;


class WebSocketController extends Controller
{
    protected $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    public function onMessage(ConnectionInterface $connection, $data)
    {
        $data = json_decode($data, true);

        try {
            $validatedData = $this->validationService->validateWebSocketData($data);

            // Data is valid; perform your WebSocket logic here
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed; handle the error
            $errors = $e->validator->errors()->all();
            $connection->send(json_encode(['error' => $errors]));
        }
    }
}
