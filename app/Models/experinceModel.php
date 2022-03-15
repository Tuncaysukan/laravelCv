<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experinceModel extends Model
{
    use HasFactory;

    protected $table='experince';
    protected $primaryKey='id';
    protected $guarded=[];
}
