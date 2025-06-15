<?php

$auth_token = 'eyJhbGciOiJIUzUxMiJ9.eyJhdWQiOiJBUEkiLCJyZWZyZXNoX3Rva2VuIjoiZXlKaGJHY2lPaUpJVXpVeE1pSjkuZXlKaGRXUWlPaUpCVUVraUxDSnpkV0lpT2lKaGJXRnVjbUZxTmpJeU1VQm5iV0ZwYkM1amIyMGlMQ0poY0dsZmEyVjVJam9pYTJWNVgyeHBkbVZmU1VkU2MwSnFOVmxhWnpKQmJVWjJSMVZ1VEhoclJFTk9TMVpHU0dGcVpUUWlMQ0pwYzNNaU9pSmhjR2t1YzJGdVpHSnZlQzVqYnk1cGJpSXNJbVY0Y0NJNk1UYzJOVFV4T1RReE55d2lhVzUwWlc1MElqb2lVa1ZHVWtWVFNGOVVUMHRGVGlJc0ltbGhkQ0k2TVRjek16azRNelF4TjMwLk5iVDZtVDJZWVpGbDdrV1RINTVMT25pZ0pzQm5hMUd5Um9uMVBBRXlPTS04c09fdDBDWGRKN1VFN2tlWmUydUFMVU8wSGUxa2RrQnlXcS1SOG5FYzBBIiwic3ViIjoiYW1hbnJhajYyMjFAZ21haWwuY29tIiwiYXBpX2tleSI6ImtleV9saXZlX0lHUnNCajVZWmcyQW1GdkdVbkx4a0RDTktWRkhhamU0IiwiaXNzIjoiYXBpLnNhbmRib3guY28uaW4iLCJleHAiOjE3MzQwNjk4MTcsImludGVudCI6IkFDQ0VTU19UT0tFTiIsImlhdCI6MTczMzk4MzQxN30.AkUThL-1OzloYsfwFDqikAR6KdBg_6jD5KPvZQW4BKFgEqvoAH_WJ_DwGfyWjUhZBOFqKuNIb_HpVoRj0YRYgg';

if (isset($_GET['sendotp'])) {
    $aadharno = $_POST['aadhar_no'];
    $url = 'https://api.sandbox.co.in/kyc/aadhaar/okyc/otp';

    // Updated data payload to match expected structure
    $data = [
        "@entity" => "in.co.sandbox.kyc.aadhaar.okyc.otp.request",
        "aadhaar_number" => $aadharno,
        "consent" => "Y",
        "reason" => "for testing purpose test"
    ];

    $headers = [
        'accept: application/json',
        'authorization: ' . $auth_token,
        'x-api-key: key_live_IGRsBj5YZg2AmFvGUnLxkDCNKVFHaje4',
        'x-api-version: 1.0',
        'content-type: application/json',
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // JSON encoding the payload
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'CURL Error: ' . curl_error($ch);
    } else {
        echo $result;
    }

    curl_close($ch);

} elseif (isset($_GET['verifyotp'])) {
    $refid = $_POST['reference_id'];
    $otp = $_POST['otp'];

    $url = 'https://api.sandbox.co.in/kyc/aadhaar/okyc/otp/verify';

    $data = [
        "reference_id" => $refid,
        "@entity" => "in.co.sandbox.kyc.aadhaar.okyc.request",
        "otp" => $otp,
    ];

    $headers = [
        'accept: application/json',
        'authorization: ' . $auth_token,
        'x-api-key: key_live_IGRsBj5YZg2AmFvGUnLxkDCNKVFHaje4',
        'x-api-version: 1.0',
        'content-type: application/json',
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));  // JSON encoding the payload
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'CURL Error: ' . curl_error($ch);
    } else {
        echo $result;
    }

    curl_close($ch);
}
