<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function detail(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id', 'id');
    }
}
