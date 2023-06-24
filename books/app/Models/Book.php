<?php

// Model deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Book extends Model{

use HasFactory;
public $timestamps = false; 
protected $primaryKey = 'id'; 

protected $table = 'tblbooks';

protected $fillable = [
'bookname', 'yearpublish', 'authorid'
];  
}