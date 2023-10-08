<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = ['userid', 'numclient', 'designation', 'commentaire', 'datetache','etat','priorité','userid2','userid3'];
}
