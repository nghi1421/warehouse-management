<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PhpParser\Node\Expr\Cast\Array_;

class Import extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsToUser(User::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'import_details');
    }

    public function information(): Attribute
    {
        return Attribute::make(
            get: function (): Array {
                $user = $this->user();

                $customer = $this->customer();

                return [
                    'user_name' => $user->name,
                    'user_address' => $user->address,
                    'user_phone_number' => $user->phone_number,
                    'user_email' => $user->email,
                    'customer_name' => $customer->name,
                    'customer_address' => $customer->address,
                    'customer_phone_number' => $customer->phone_number,
                    'customer_email' => $customer->email,
                    'status' => $this->status,
                ];
            }
        )
    }
}