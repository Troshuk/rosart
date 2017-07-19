<?php

namespace App;
trait HasCategory
{
    /**
     * A product may have multiple category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categorys()
    {
        return $this->belongsToMany(Category::class);
    }
    /**
     * Assign the given category to the product.
     *
     * @param  string $category
     * @return mixed
     */
    public function assignCategory($category)
    {
        return $this->categorys()->save(
            Category::whereName($category)->firstOrFail()
        );
    }
    /**
     * Determine if the product has the given category.
     *
     * @param  mixed $category
     * @return boolean
     */
    public function hasCategory($category)
    {
        if (is_string($category)) {
            return $this->categorys->contains('name_ru', $category);
        }
        return !! $category->intersect($this->categorys)->count();
    }
}