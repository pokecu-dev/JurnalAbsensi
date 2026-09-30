<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DispenApprovalToken extends Model
{
    protected $fillable = [
        'dispen_id',
        'token_hash',
        'expires_at',
        'used_at',
        'last_sent_at',
    ];

    protected $casts = [
        'last_sent_at' => 'datetime',
        'expires_at' => 'datetime',
        'used_at' => 'datetime',
    ];

    public function dispen()
    {
        return $this->belongsTo(Dispen::class);
    }
}
