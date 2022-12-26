<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Food;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.banner-manager.index', [
            'banners' => Banner::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.banner-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        $request->validated();
        $newImageName = time() . '-' . $request->title . '.' . $request->file('banner_image')->guessExtension();
        Banner::create([
            'title' => $request->title,
            'expires_at' => $request->expire_time,
            'banner_img' => $newImageName
        ]);
        $request->file('banner_image')->move(public_path('images/banner-images'), $newImageName);

        return redirect('/banner-manager');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admins.banner-manager.show',['banner' =>Banner::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admins.banner-manager.edit',[
            'banner' =>         Banner::find($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, $id)
    {
        $request->validated();
        $newImageName = time() . '-' . $request->title . '.' . $request->file('banner_image')->guessExtension();
        Banner::find($id)->update([
            'title' => $request->title,
            'expires_at' => $request->expire_time,
            'banner_img' => $newImageName
        ]);
        $request->file('banner_image')->move(public_path('images/banner-images'), $newImageName);

        return redirect('/banner-manager');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $banner)
    {
        Banner::find($banner)->delete();
        return  back();
    }
}
