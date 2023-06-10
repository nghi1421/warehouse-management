<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        'import_id',
        'export_id',
        'category_id',
        'position_id',
        'expiry_date',
    ];

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function import(): BelongsTo
    {
        return $this->belongsTo(Import::class);
    }

    public function export(): BelongsTo
    {
        return $this->belongsTo(Export::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function infomation(): Attribute
    {
        return Attribute::make(
            get: function (): array {
                $position = $this->position()->information;

                $import = $this->import();
                return $this->export_id ? array_merge((array)$position, [
                    'import_id' => $this->import_id,
                    'import_created_at' => $this->import_created_at,

                ]) : [];
            }
        );
    }
}