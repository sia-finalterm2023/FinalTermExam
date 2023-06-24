<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorsService {
     use ConsumesExternalService;
     /*
     *@var string

     */
     public $secret;
     public $baseUri;

     public function __construct() {
          $this->baseUri = config('services.authors.base_uri');
          $this->secret = config('services.authors.secret');
     }

     /*
     *@return string
     */

     public function showall() {
          return $this->performRequest('GET', '/authors');
     }

     public function showAuthor($id) {
          return $this->performRequest('GET', "/authors/{$id}");
     }


     public function addAuthor($data) {
          return $this->performRequest('POST', '/authors/', $data);
     }

     public function updateAuthor($data, $id) {
          return $this->performRequest('PATCH', "/authors/{$id}", $data);
     }

     public function deleteAuthor($id) {
          return $this->performRequest('DELETE', "/authors/{$id}");
     }
}