<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Balance;
use App\User;

class Funcionario extends Model
{
    protected $table = 'funcionarios';

    protected $fillable =['nome_completo','login','password','saldo_atual','user_id'];

    public function search($filter = null)
    {
        $result = $this->where(function($query) use($filter) {
            if ($filter) {
                $query->where('nome_completo','LIKE',"%{$filter}%");
            }
        })
        ->paginate();
        return $result;
    }

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }


}
