<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'fields';

    protected $appends = [
        'type_label',
    ];

    protected $casts = [
        'nullable' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $filterable = [
        'id',
        'name',
        'description',
        'type',
        'table_link',
        'field_group.name',
    ];

    protected $orderable = [
        'id',
        'name',
        'description',
        'type',
        'table_link',
        'nullable',
        'field_group.name',
    ];

    protected $fillable = [
        'name',
        'description',
        'type',
        'table_link',
        'nullable',
        'field_group_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const TYPE_SELECT = [
        [
            'label' => 'Input',
            'value' => 'input',
        ],
        [
            'label' => 'Textarea',
            'value' => 'textarea',
        ],
        [
            'label' => 'Checkbox',
            'value' => 'checkbox',
        ],
        [
            'label' => 'Radio',
            'value' => 'radio',
        ],
        [
            'label' => 'Select',
            'value' => 'select',
        ],
        [
            'label' => 'Select Multi',
            'value' => 'select_multi',
        ],
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getTypeLabelAttribute()
    {
        return collect(static::TYPE_SELECT)->firstWhere('value', $this->type)['label'] ?? '';
    }

    public function fieldGroup()
    {
        return $this->belongsTo(FieldsGroup::class);
    }
}
