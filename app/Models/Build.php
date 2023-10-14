<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $app_id
 * @property string $status
 * @property string $input
 * @property string $output
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property App $app
 */
class Build extends Model
{
    public const STATUS_START = 'start';

    public function app(): BelongsTo
    {
        return $this->belongsTo(App::class);
    }
}
