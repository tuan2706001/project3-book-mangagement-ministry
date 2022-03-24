<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectInfo extends Model
{
    use HasFactory;
    protected $table = 'subjectinfo';
    public $timestamps = false;

    public $primaryKey = 'id';
}
