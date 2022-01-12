<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\AdCreate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{

    public function index(){
        $ads = DB::table('ads')->paginate(5);
        $tableCategory = Category::all();
        return view('welcome', compact('ads', 'tableCategory'));
    }
    public function form(){
        $tableCategory = Category::all();
        return view('newAd', compact('tableCategory'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'title' => ['required', 'min:5'],
            'category_id' => ['required'],
            'description' => ['required'],
            'picture' => ['mimes:jpeg,bmp,png,jpg'],
            'location' => ['required'],
            'price' => ['required']
        ]); 
        if($request->hasFile('picture'))
        {
            $imageName = time(). "." . $request->picture->extension();
            $request->picture->storeAs('/public/images', $imageName);
            $ads = Ads::create([
                'title' => request('title'),
                'category_id' => request('category_id'),
                'description' => request('description'),
                'picture' => $imageName,
                'location' => request('location'),
                'price' => request('price'),
                'proprietaire_id' => Auth::id()
            ]);
            $tableCategory = Category::all();
            $result = "Ad has been created !";
            return view('/newAd')->with('var', $result)->with('tableCategory', $tableCategory);
        }
        
        $result = "Ad has been created !";

    $ads = Ads::create([
        'title' => request('title'),
        'category_id' => request('category_id'),
        'description' => request('description'),
        'picture' => NULL,
        'location' => request('location'),
        'price' => request('price'),
        'proprietaire_id' => Auth::id()
    ]);

    // $tableCategory = 1;
    $tableCategory = Category::all();

    return view('/newAd')->with('var', $result)->with('tableCategory', $tableCategory);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::id();
        $ads = Ads::where('proprietaire_id','like',"$id")->paginate(5);
        $tableCategory = Category::all();
        return view('/dashboard')->with('ads', $ads)->with('tableCategory', $tableCategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $ads = Ads::findOrFail($id);
        $tableCategory = Category::all();
        return view('editAds', compact('ads', 'tableCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $ads = Ads::findOrFail($id);
        request()->validate([
            'title' => ['required', 'min:5'],
            'category_id' => ['required'],
            'description' => ['required'],
            'picture' => ['mimes:jpeg,bmp,png,jpg'],
            'location' => ['required'],
            'price' => ['required']
            // 'title' => 'required', 'min:5',
            // 'category_id' => 'required',
            // 'picture' => 'mimes:jpeg,bmp,png,jpg',
            // 'location' => 'required',
            // 'description' => 'required',
            // 'price' => 'required',
        ]);
        $result = "Ad has been updated";
        if($request->hasFile('picture'))
        {
            $imageNameLink = Ads::whereId($id)->pluck('picture');
            Storage::delete('public/images/' .$imageNameLink[0]);
            $imageName = time(). "." . $request->picture->extension();
            $request->picture->storeAs('/public/images', $imageName);

            Ads::whereId($id)->update([
                'title' => request('title'),
                'category_id' => request('category_id'),
                'picture' => $imageName,
                'location' => request('location'),
                'description' => request('description'),
                'price' => request('price')
            ]);

            return redirect("/editAd/$id")->with('var', $result);
        }
        Ads::whereId($id)->update([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'location' => request('location'),
            'description' => request('description'),
            'price' => request('price')
        ]);

        $tableCategory = Category::all();
        return view('editAds')->with('ads', $ads)->with('tableCategory', $tableCategory)->with('var', $result);
        // return redirect()->to('editAds')->with('var', $result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destruction($id)
     {
         $ads = Ads::findOrFail($id);
        return view('deleteAds', compact('ads'));
     }
    public function destroy($id)
    {
        $imageName = Ads::whereId($id)->pluck('picture');
       Storage::delete('public/images/' .$imageName[0]);
       Ads::whereId($id)->delete();
        return redirect('/dashboard');
    }
    
    public function search(){

        $search = request()->input('search');
        $filter = request()->input('filter1');
        $filter2 = request()->input('filter2');

        $ads = Ads::where('title', 'like', "%$search%")
                ->orwhere('description', 'like', "%$search%")
                ->orwhere('location', 'like', "%$search%")
                ->orwhere('price', 'like', "%$search%")
                ->orwhere('category_id', 'like', "%$search%")
                ->orderBy("$filter", "$filter2");


       
                
        $ads = $ads->paginate(5);
        $tableCategory = Category::all();
       
        return view('search')->with('ads', $ads)->with('tableCategory', $tableCategory);;
        
       
    }
}
