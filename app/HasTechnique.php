<?php

namespace App;
trait HasTechnique
{
    /**
     * A product may have multiple technique.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function techniques()
    {
        return $this->belongsToMany(Technique::class);
    }
    /**
     * Assign the given role to the user.
     *
     * @param  string $technique
     * @return mixed
     */
    public function assignTechnique($technique)
    {
        return $this->techniques()->save(
            Technique::whereName($technique)->firstOrFail()
        );
    }
    /**
     * Determine if the product has the given technique.
     *
     * @param  mixed $technique
     * @return boolean
     */
    public function hasTechnique($technique)
    {
        if (is_string($technique)) {
            return $this->techniques->contains('name_ru', $technique);
        }
        return !! $technique->intersect($this->techniques)->count();
    }
}