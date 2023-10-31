<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grape extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'grapes';

    protected $appends = [
        'color_label',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $orderable = [
        'id',
        'grapes',
        'synonyms',
        'color',
    ];

    protected $filterable = [
        'id',
        'grapes',
        'synonyms',
        'color',
    ];

    protected $fillable = [
        'grapes',
        'synonyms',
        'color',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const COLOR_SELECT = [
        [
            'label' => 'White',
            'value' => 'white',
        ],
        [
            'label' => 'Red',
            'value' => 'red',
        ],
        [
            'label' => 'Other',
            'value' => 'other',
        ],
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getColorLabelAttribute()
    {
        return collect(static::COLOR_SELECT)->firstWhere('value', $this->color)['label'] ?? '';
    }
}
