<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkVerificationResult extends Model
{
    protected $fillable = [
        'bulk_verification_task_id',
        'email',
        'overall_status',
        'syntax',
        'role_based',
        'catch_all',
        'disposable',
        'spam_trap',
        'smtp',
        'ssl',
    ];
     public function bulkVerification()
    {
        return $this->belongsTo(BulkVerification::class, 'bulk_verification_task_id');
    }
}
