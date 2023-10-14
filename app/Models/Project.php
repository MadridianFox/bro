<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection<int,App> $apps
 */
class Project extends Model
{
    public function apps(): HasMany
    {
        return $this->hasMany(App::class);
    }
}
