<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getTransectionId() {
        return $this->hasOne('App\Models\Transection','ledger_id', 'id');
    }
}
