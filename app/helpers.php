<?php

if (!function_exists('sendNotFoundResponse')) {
    function sendNotFoundResponse($message = 'Resource not found')
    {
        return response()->json(['message' => $message], 404);
    }
}

if (!function_exists('sendSuccessResponse')) {
    function sendSuccessResponse($message)
    {
        return response()->json(["message" => $message], 200);
    }
}
