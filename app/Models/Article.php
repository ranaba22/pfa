<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'image', 'quantité', 'prix_d_achat', 'prix_de_vente', 'id_fournisseur', 'id_categorie'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categorie');
    }
    
    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fournisseur');
    }
}
