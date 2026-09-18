<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Beat;
use App\Models\License;

class ApiController extends Controller
{
    public function getExploreData()
    {
        // Obtenemos tu perfil (el primer usuario)
        $producer = User::first(); 
        
        // Obtenemos todo el catálogo de beats
        $beats = Beat::all();
        
        // Obtenemos todas las licencias y decodificamos el JSON de 'features'
        $licenses = License::all()->map(function ($license) {
            $license->features = json_decode($license->features);
            return $license;
        });

        // Retornamos la estructura exacta que Flutter ya sabe leer
        return response()->json([
            'producer' => $producer,
            'beats' => $beats,
            'licenses' => $licenses
        ]);
    }
}