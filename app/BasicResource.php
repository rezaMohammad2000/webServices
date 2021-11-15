<?php


namespace App;


class BasicResource
{
    public function toArray($request, $message ='', $error = null)
    {
        return [
            "data" =>$request,
            'message' => $message,
            'error' => $error
        ];
    }
}
