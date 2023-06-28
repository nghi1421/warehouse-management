<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        return $this->belongsTo(User::class);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'import_details')->withPivot('amount');
    }

    public function information(): Attribute
    {
        return Attribute::make(
            get: function (): array {
                $user = $this->user;

                $customer = $this->customer;

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
        );
    }

    public function getUserName(): string
    {
        return $this->user->name;
    }
}
