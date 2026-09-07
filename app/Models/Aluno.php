<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'curso'];

    public static function deCurso(string $curso)
    {
        return self::where('curso', $curso)->get();
    }

    public static function nomeContem(string $palavra)
    {
        return self::where('nome', 'like', '%' . $palavra . '%')->get();
    }

    public static function cadastradosRecentemente()
    {
        return self::latest()->take(5)->get();
    }

    public static function quantidadeTotal()
    {
        return self::count();
    }
}