<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'book';
    protected $primaryKey = 'BOOK_ID';
    public $incrementing = false;
    protected $keyType = 'string';
}
