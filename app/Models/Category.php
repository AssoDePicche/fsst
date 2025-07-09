<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'user_id',
        'name',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function getExcludingParentAndChildren(string $id)
    {
        $self = self::findOrFail($id);

        $parent = $self->parent;

        $children = self::where('parent_id', $id)->pluck('id')->toArray();

        return self::whereNotIn('id', array_merge([$id], $children, [$parent]))->get();
    }
}
