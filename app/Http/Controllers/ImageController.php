<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        Storage::delete($image->url);
        $image->delete();
        
        return redirect()->back();
    }
}
