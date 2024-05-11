<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductServices extends Model
{
    use HasFactory;

    protected $fillable = [
        'ServiceName',
        'Category_id',
        'ServicePrice',
        'Rating',
        'Feedback',
        'User_id',
        'AdditionalService',
        'AdditionalServicePrice'
    ];

    /**
     * A description of the entire PHP function.
     *
     * @return Some_Return_Value
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }

    /**
     * Retrieve the user associated with this product or service.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'User_id');
    }
}
