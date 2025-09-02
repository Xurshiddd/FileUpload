<?php

namespace Xurshiddd\LaravelAttachment\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $table = 'attachments'; // jadval nomi

    protected $fillable = [
        'extra_identifier',
        'title',
        'path',
        'size',
        'type',
        'attachment'
    ];
}
