<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    public function statut()
    {
        return $this->belongsTo(Statut::class, 'id_statut');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type');
    }
    public function livreur()
    {
        return $this->belongsTo(Livreur::class, 'id_livreur');
    }
    public function serveur()
    {
        return $this->belongsTo(Serveur::class, 'id_serveur');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }
}
