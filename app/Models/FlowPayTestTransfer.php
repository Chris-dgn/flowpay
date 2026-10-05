<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlowPayTestTransfer extends Model
{
    protected $table = 'flowpay_test_transfers';

    protected $fillable = [
        'user_id',
        'beneficiary',
        'account',
        'bank_name',
        'bic_swift',
        'amount',
        'reason',
        'test_code',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}