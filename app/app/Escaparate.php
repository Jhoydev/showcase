<?php

namespace App;

use App\Clients\ClientFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Escaparate
 *
 * @package App
 * @property int $id
 * @property string $name
 * @property string $orientation
 * @property string $slug
 * @property string|null $thumbnail
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereOrientation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escaparate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Escaparate extends Model
{
    /**
     * @param $referer
     * @return mixed
     */
    public function make($referer)
    {
        if ($referer) {
            return ClientFactory::make($referer);
        }
    }

    public function view()
    {
        return 'escaparates.plantillas.' . $this->slug;
    }
}
