<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{

    public function users()
    {
      
       return $this->belongsTo(User::class);

    }
    public function produits()
    {
      
       return $this->belongsToMany(Produit::class);

    }


    use HasFactory;
}
