<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['numclient','nameclient', 'tel1', 'tel2', 'mail', 'adresse','type','codeporte'];

    // ...

    // Vous pouvez également définir des relations Eloquent ici, si nécessaire.
}
