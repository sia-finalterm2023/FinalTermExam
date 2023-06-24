<?php

// Model deals with database
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model{

use HasFactory;
public $timestamps = false; 
protected $primaryKey = 'id'; 

// name of table

protected $table = 'tblauthors';

// column sa table
protected $fillable = [
'fullname', 'gender', 'birthday'
];  

}