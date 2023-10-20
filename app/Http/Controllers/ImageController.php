<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Services\ValidationService;
use Illuminate\Validation\Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view_image(): View
    {
        return view('sampleImg');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function image_upload(Request $request)
    {
        $request->validate([
            'valImage' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'userProfile' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $valImage = 'valUser'.'.'.$request->valImage->extension();
        $userProfile = 'userProfile'.'.'.$request->userProfile->extension();

        $request->valImage->move(public_path('images'), $valImage);
        $request->userProfile->move(public_path('images/profiles'), $userProfile);

        /*return redirect()->back()->withSuccess('Upload image successful')
        ->with('valImage', $valImage)->with('userProfile', $userProfile);*/
    }

}
