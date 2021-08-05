<?php

namespace App\Models;

use App\Tenant\TenantModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoMedica extends Model
{
    use HasFactory;
    use TenantModels;

    protected $table = 'avaliacao_medica';

    protected $fillable = [
        'idusuario',
        'idinstrutor',
        'peso',
        'altura',
        'imc',
        'percgorduracorporal',
        'medidabicepsdir',
        'medidabicepsesq',
        'medidatricepsdir',
        'medidatricepsesq',
        'medidaombro',
        'medidacostas',
        'medidacoxadir',
        'medidacoxaesq',
        'medidapanturrilhadir',
        'medidapanturrilhaesq',
        'anexoavaliacao',
        'iddoencafisica',
        'fldeficiente',
        'flpossuilesao',
        'observacao',
    ];

    protected $dates = [
        'dataavaliacao',
        'dataexpiracaoavaliacao',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
