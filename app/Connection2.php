<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection2 extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'anaks';
    protected $primarykey = 'id_anak';
    protected $guard = [];

}
