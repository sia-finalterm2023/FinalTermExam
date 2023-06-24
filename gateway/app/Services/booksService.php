<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BooksService {
     use ConsumesExternalService;

     public $secret;
     public $baseUri;

     public function __construct() {
          $this->baseUri = config('services.books.base_uri');
          $this->secret = config('services.books.secret');
     }

     public function showall() {
          return $this->performRequest('GET', '/books');
     }

     public function showBook($id) {
          return $this->performRequest('GET', "/books/{$id}");
     }


     public function addBook($data) {
          return $this->performRequest('POST', '/books/', $data);
     }

     public function updateBook($data, $id) {
          return $this->performRequest('PATCH', "/books/{$id}", $data);
     }

     public function deleteBook($id) {
          return $this->performRequest('DELETE', "/books/{$id}");
     }

}