<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Dispen extends Model
{
    use HasFactory;

    protected $table = 'dispens';

    protected $fillable = [
        'kategori',
        'alasan',
        'tgl',
        'jam_mulai',
        'jam_selesai',
        'status',
        'approved_by',
        'approval_user_id',
    ];

    protected $casts = [
        'tgl' => 'date',
    ];

    public function details(): HasMany
    {
        return $this->hasMany(DetailDispen::class, 'dispen_id');
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function approvalToken(): HasOne
    {
        return $this->hasOne(DispenApprovalToken::class);
    }

    public function approvalUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approval_user_id');
    }
}
