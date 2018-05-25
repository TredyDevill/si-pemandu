<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $connection = 'mysql';

    protected $table = 'kms';
    protected $primarykey = 'id_kms';
    protected $guard = [];
}
