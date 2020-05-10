<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function SendResponse($result, $message)
		{
			$response = [
				'success' => true,
			 	'data' => $result, //dati da passare
			 	'message' => $message, //messaggio da mandare
			];
			return response()->json($response, 200); //200 è l'http status code
		}

		public function sendError($error, $errorMessages = [], $code = 404)
		{
			$response = [
				'success' => false,
				'message' => $error,
			];

			if (!empty($errorMessages)) {
				$response['data'] = $errorMessages;
			}
			return response()->json($response, $code);
		}
}
