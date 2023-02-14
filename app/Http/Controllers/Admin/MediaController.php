<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ImageResource;
use App\Models\MediaUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\Models\Media;

class MediaController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(Request $request)
    {
        $media = null;
        if ($request->hasFile('image')) {
            /** @var MediaUpload $media */
            $media = MediaUpload::create();
            $media->addMediaFromRequest('image')
                ->toMediaCollection('uploads');
        } elseif ($request->hasFile('img')) {
            /** @var MediaUpload $media */
            $media = MediaUpload::create();
            $media->addMediaFromRequest('img')
                ->toMediaCollection('uploads');
        }

        return response()->json($media ? new ImageResource($media->getFirstMedia('uploads')) : null);
    }

    /**
     * @param Media $media
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Media $media)
    {
        $media->delete();
        return \response()->json([]);
    }
}
