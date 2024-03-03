<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'produse';
    protected $primaryKey = 'id';
    protected $fillable = ['denumire', 'descriere', 'pret', 'categorie_produs', 'alegere', 'imagine'];


    
}