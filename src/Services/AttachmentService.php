<?php

namespace Xurshiddd\LaravelAttachment\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
namespace Xurshiddd\LaravelAttachment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
final class AttachmentService{
    public function uploadFile(
        array $files,
        MorphOne|MorphMany|MorphToMany|null $relation = null,
        string $path = 'files',
        ?string $identifier = null
    ): array {
        $dataToInsert = [];

        foreach ($files as $file) {
            if (! $file instanceof UploadedFile) continue;

            $type = $file->getClientOriginalExtension();
            $fileName = md5(uniqid() . $file->getFilename()) . '.' . $type;
            $file->storeAs("uploads/$path", $fileName, 'public');

            $data = [
                'title' => $file->getClientOriginalName(),
                'size' => $file->getSize(),
                'path' => "uploads/$path/$fileName",
                'type' => $file->extension(),
                'extra_identifier' => $identifier,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if ($relation) {
                $data['attachment_type'] = $relation->getMorphClass();
                $data['attachment_id'] = $relation->getParent()->getKey();
            }

            $dataToInsert[] = $data;
        }

        DB::table('attachments')->insert($dataToInsert);

        return $dataToInsert;
    }
}
