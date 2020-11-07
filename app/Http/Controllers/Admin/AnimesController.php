<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Anime;

class AnimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Anime $anime)
    {
        $user = auth()->user();
        $all_animes = $anime->getAllMyanimes($user->id);
        // dd($all_animes);
        return view('animes.index', [
            'all_animes' => $all_animes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = auth()->user();

        return view('animes.create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Anime $anime)
    {
        $user = auth()->user();
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:200'],
            'text' => ['required', 'max:140'],
            'status' => ['required', 'string', 'max:140']
        ]);
        $validator->validate();
        
        if(isset($data['image'])){
            //画像をStrange内に格納し、パスを代入
            $path = $request->file('image')->store('public/animes');
            // //画像のパス先を格納
            $anime->anime_image = basename($path);
            // $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
            // $news->image_path = Storage::disk('s3')->url($path);
        } else {
            $anime->anime_image = null;
        }
        
        $anime->animeStore($user->id, $data);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        $user = User::find($anime->user_id);
        // dd($user);
        return view('animes.edit', [
            'user' => $user,
            'anime' => $anime
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $anime = Anime::find($request->id);
        $form = $request->all();
        
        $validator = Validator::make($form, [
            'titlw'         => ['string', 'max:30'],
            'text'          => ['required', 'string', 'max:200'],
            'status'        => ['required', 'string', 'max:255'],
            'recommend'     => ['required'],
            'image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ]);
        $validator->validate();
        
        // 画像の判定処理
        if ($request->file('image')) {
            $path = $request->file('image')->store('public/animes');
            $form['anime_image'] = basename($path);
            // $path = Storage::disk('s3')->putFile('/profile_image',$form['image'],'public');
            // $news->image_path = Storage::disk('s3')->url($path);
        } else {
            $form['anime_image'] = $anime->anime_image;;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        $anime->fill($form)->save();
        
        return redirect('animes/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //d
    }
}
