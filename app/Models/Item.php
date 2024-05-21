<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'NamaBarang',
        'Deskripsi'
    ];

    // Specify the table name (if different from the plural form of the model name)
    protected $table = 'items';

    // Specify the primary key (if different from the default 'id')
    protected $primaryKey = 'id';

    // Indicate if the IDs are auto-incrementing
    public $incrementing = true;

    // Indicate the data type of the primary key (if different from the default 'int')
    protected $keyType = 'int';

    // Disable timestamps if not used in the table
    public $timestamps = true;

    // Define fillable attributes to allow mass assignment


    public function Fasilitas()
    {
        // return $this->hasMany(Fasilitas::class, 'barang_id');
        return $this->belongsTo(Fasilitas::class, 'barang_id');
    }
}
