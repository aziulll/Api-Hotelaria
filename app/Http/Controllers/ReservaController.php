<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Reserva;
use Illuminate\Http\Request;


class ReservaController extends Controller
{

    public function store (Request $request) 
    {
        $reserva = new Reserva();
    }

    public function reservasDoCliente($clienteId)
    {
        try {
            // Encontrar o cliente pelo ID
            $cliente = Cliente::findOrFail($clienteId);

            // Obter todas as reservas associadas a esse cliente
            $reservasDoCliente = $cliente->reservas;

            // Retornar as reservas como JSON
            return response()->json(['reservas_do_cliente' => $reservasDoCliente], 200);
        } catch (\Exception $e) {
            // Tratar erro, por exemplo, cliente não encontrado
            return response()->json(['error' => 'Cliente não encontrado'], 404);
        }
    }
}
