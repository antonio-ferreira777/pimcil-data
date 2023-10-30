<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FieldsData extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'fields_datas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'product.ean',
        'field.name',
        'field_order',
    ];

    protected $filterable = [
        'id',
        'product.ean',
        'field.name',
        'field_order',
    ];

    protected $fillable = [
        'product_id',
        'field_id',
        'field_order',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
