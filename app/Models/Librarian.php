<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Librarian extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'librarians';
    protected $primaryKey = 'USERID';
    public $incrementing = false;
    protected $keyType = 'string';
}
