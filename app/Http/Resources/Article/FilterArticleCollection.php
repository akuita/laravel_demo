form the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($item) {
            return [
                'id' => $item->id,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,

            ];
        })->all();
    }
}
<?php

namespace App\Http\Resources\Article;

use App\Http\Resources\BaseJsonCollection;

/**
 * @mixin \App\Models\Article;
 */
class FilterArticleCollection extends BaseJsonCollection
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string|null
     */
    public static $wrap = 'articles';

    /**
     * Trans