<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categorii';
    protected $primary_key = ['id'];
    protected $fillable = ['denumire'];

    public function getCategories()
    {
        return $this->get();
    }
}