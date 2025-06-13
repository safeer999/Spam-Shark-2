<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkVerification extends Model
{
   protected $fillable = [
        'user_id',
        'task_uuid', 
        'task_name',
        'original_file_name',
        'stored_file_path',
        'result_file_path',
        'status',
        'progress',
        'total_emails',
        'summary_counts',
        'started_at',
        'completed_at',
    ];
      public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function results()
    {
        return $this->hasMany(BulkVerificationResult::class, 'bulk_verification_task_id');
    }
}