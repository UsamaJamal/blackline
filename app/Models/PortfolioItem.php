<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'btn_text',
        'btn_link',
        'industry',
        'category',
        'sort_order'
    ];

    /**
     * Available portfolio categories (slug => display label).
     */
    public static array $categories = [
        'web-development' => 'Web Development',
        'mobile-app-development' => 'Mobile App Development',
    ];

    /**
     * Human readable label for this item's category.
     */
    public function getCategoryLabelAttribute(): string
    {
        return self::$categories[$this->category] ?? 'Web Development';
    }
}
