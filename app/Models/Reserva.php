<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    protected $fillable = ['data_checkin', 'data_checkout', 'quarto_id', 'cliente_id'];

    /**
     *
     * @param int $clienteId ID do cliente
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function reservasPorCliente($clienteId)
    {
        return $this->where('cliente_id', $clienteId)->get();
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
}


