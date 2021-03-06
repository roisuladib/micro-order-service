<?php

use Illuminate\Support\facades\Http;

function createPremiumAccess($data) {
   $url = env('URL_COURSE_SERVICE') . '/api/my-courses/premium';
   try {
      $response = Http::post($url, $data);
      $data = $response->json();
      $data['http_code'] = $response->getStatusCode();
      return $data;
   } catch (\Throwable $th) {
      return [
         'status' => 'error',
         'http_code' => 503,
         'message' => 'Course service unavailable',
      ];
   }
}
