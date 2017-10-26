<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('check_login');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Media';
        return view('admin.media', compact('Media'));
    }

    public function postMedia(Request $request)
    {
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');
                // set destination path
                $folderDir = 'uploads/products';
                $destinationPath = base_path() . '/' . $folderDir;
                // this form uploads multiple files
                foreach ($request->file('file') as $fileKey => $fileObject) {
                    // make sure each file is valid
                    if ($fileObject->isValid()) {
                        // make destination file name
                        $destinationFileName = time() . $fileObject->getClientOriginalName();
                        // move the file from tmp to the destination path
                        $fileObject->move($destinationPath, $destinationFileName);
                        // save the the destination filename
//                        $prodcuctImage = new ProductImage;
//                        $ProdcuctImage->image_path = $folderDir . $destinationFileName;
//                        $prodcuctImage->title = $originalNameWithoutExt;
//                        $prodcuctImage->alt = $originalNameWithoutExt;
//                        $prodcuctImage->save();
                    }
                }
            }
        }
    }

    public function deleteMedia()
    {

    }
}
