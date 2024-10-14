<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembelian',
        'jumlah_pembelian',
        'tanggal',
        'material_id',
        'supplier_id',
        'deskripsi'
    ];

    // Hubungkan ke model Material
    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    // Hubungkan ke model Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
