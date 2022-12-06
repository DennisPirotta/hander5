<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

/**
 * App\Models\Customer
 *
 * @method static create()
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 * @property-read Collection|Transaction[] $transactions
 * @property-read User $user
 * @mixin Eloquent
 */
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','user_id'
    ];

    public function exchanges(): Collection
    {
        $payed = $debits = $payed_count = $debits_count = 0;
        $this->transactions->each(static function($item) use (&$payed,&$debits,&$payed_count,&$debits_count){
            if ($item->payed){
                $payed += (int)$item->amount;
                $payed_count++;
            }else{
                $debits += (int)$item->amount;
                $debits_count++;
            }
        });
        return collect([
            'payed' => [
                'count' => $payed_count,
                'total' => $payed
            ],
            'debits' => [
                'count' => $debits_count,
                'total' => $debits
            ]
        ]);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
