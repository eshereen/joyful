<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Shipment extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'shipments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'area_id',
        'shipment_company_id',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }

    public function shipment_company()
    {
        return $this->belongsTo(ShipmentCompany::class, 'shipment_company_id');
    }
}
