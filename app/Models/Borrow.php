<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    protected $fillable = [
        'reader_id',
        'books_id',
        'status',
        'request_processed_at',
        'request_managed_by',
        'deadline',
        'returned_at',
        'return_managed_by'
    ];

    public function books() {
        return $this->belongsTo(Book::class);
      }

    public function reader() {
        return $this->belongsTo(User::class);
      }

    public function managerRequests() {
        return $this->belongsTo(User::class);
      }

    public function managerReturns() {
        return $this->belongsTo(User::class);
      }
}
