<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historic extends Model
{
    protected $table = 'historics';

    protected $fillable =['tipo_movimentacao','observation','valor','funcionario_id','user_id'];

    public function search($filter = null)
    {
        $result = $this->where(function($query) use($filter) {
            if ($filter) {
                $query->where('tipo_movimentacao','LIKE',"%{$filter}%");
            }
        })
        ->paginate();
        return $result;
    }

}
