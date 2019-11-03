<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int|null $parent_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Category newModelQuery()
 * @method static Builder|Category newQuery()
 * @method static Builder|Category query()
 * @method static Builder|Category whereCreatedAt($value)
 * @method static Builder|Category whereId($value)
 * @method static Builder|Category whereName($value)
 * @method static Builder|Category whereParentId($value)
 * @method static Builder|Category whereUpdatedAt($value)
 * @property-read Collection|Post[] $posts
 * @property-read int|null $posts_count
 */
class Category extends BaseModel
{
    protected $table = 'categories';

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'categories_posts');
    }
}
