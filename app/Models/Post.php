<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $publish_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Post newModelQuery()
 * @method static Builder|Post newQuery()
 * @method static Builder|Post query()
 * @method static Builder|Post whereContent($value)
 * @method static Builder|Post whereCreatedAt($value)
 * @method static Builder|Post whereId($value)
 * @method static Builder|Post wherePublishDate($value)
 * @method static Builder|Post whereTitle($value)
 * @method static Builder|Post whereUpdatedAt($value)
 * @property-read Collection|Category[] $categories
 * @property-read int|null $categories_count
 */
class Post extends BaseModel
{
    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'publish_date'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_posts');
    }
}
