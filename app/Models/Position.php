<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'block_id',
        'shelf_id',
    ];

    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

    public function shelf(): BelongsTo
    {
        return $this->belongsTo(Shelf::class);
    }

    public function information(): Attribute
    {
        return Attribute::make(
            get: function (): array {
                $block = $this->block();

                $shelf = $this->shelf();

                return [
                    'block_name' => $block->name,
                    'shlef_name' => $shelf->name,
                ];
            }
        );
    }
}