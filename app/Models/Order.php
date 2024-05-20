<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'OrderTicker',
        'user_id',
        'product_services_id',
        'category_id',
        'address',
        'total_price',
        'status',
        'phoneNumber',
    ];

    // Generate OrderTicker before saving the model
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $order->OrderTicker = 'ORD-' . uniqid();
        });
    }

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productServices()
    {
        return $this->belongsTo(ProductServices::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function userDetails()
    {
        return $this->belongsTo(UserDetails::class);
    }

    // Define the enum for status
    public const STATUS_CONFIRMED = 'Confirmed';
    public const STATUS_PENDING = 'Pending';
    public const STATUS_CANCELED = 'Canceled';

    public static $statusOptions = [
        self::STATUS_CONFIRMED,
        self::STATUS_PENDING,
        self::STATUS_CANCELED,
    ];

    // Set default status
    protected $attributes = [
        'status' => self::STATUS_PENDING,
    ];

    // Mutator for status attribute
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = in_array($value, self::$statusOptions) ? $value : self::STATUS_PENDING;
    }
}
