<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $table = 'kaders';

    protected $primarykey ='id_kader';
    protected $fillable = ['nama_admin', 'username', 'password', 'email', 'no_hp', 'bio', 'alamat', 'tgl_lahir', 'tgl_join'];
}
