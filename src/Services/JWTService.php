<?php

namespace App\Services;

class JWTService
{
    public static function isValid(string $jwt): bool
    {
        $parts = explode('.', $jwt);
        $payloadJson = base64_decode(strtr($parts[1], '-_', '+/'));
        $payload = json_decode($payloadJson, true);
        return time() <= $payload['exp'];
    }

    public static function getClaim(string $jwt, string $key): mixed
    {
        $parts = explode('.', $jwt); // div token "header.payload.signature"
        if (count($parts) !== 3) return null;

        $payloadJson = base64_decode(strtr($parts[1], '-_', '+/')); // base64url → base64
        $payloadData = json_decode($payloadJson, true); // decode JSON

        return $payloadData[$key] ?? null;
    }
}
