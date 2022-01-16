<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lectures extends Model
{
    use HasFactory;

    protected $table = 'lectures';

    protected $fillable = [
        'course_title',
        'course_num',
        'lecturer',
        'room_number',
        'section_id',
        'from',
        'to',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
