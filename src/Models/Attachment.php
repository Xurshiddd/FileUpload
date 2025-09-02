<?php

namespace Xurshiddd\LaravelAttachment\Models;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

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
    public function url(): Attribute
    {
        return Attribute::make(fn(): string => URL::to('storage/' . $this->path));
    }
    public function attachment(): MorphTo
    {
        return $this->morphTo();
    }
}
