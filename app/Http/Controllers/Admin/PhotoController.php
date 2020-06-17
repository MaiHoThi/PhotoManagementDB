<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Photo;
use App\Tag;
use App\PhotoDescription;
use App\Category;
use App\Taggable;
use Illuminate\Http\Request;
use LengthException;
use phpDocumentor\Reflection\DocBlock\Description;

class PhotoController extends Controller
{
    function index()
    {
        $photos = Photo::all();
        foreach($photos as $photo)
        {
            $photo->tags;
            $photo->description;
            $photo->category;
        } 
        // echo "<pre>".json_encode($photos,JSON_PRETTY_PRINT)."</pre>";
       return view('photos.index',['photos'=>$photos]);
    }
    function create()
    {   
        $categories=Category::all();
        $tags=Tag::all();
        return view("photos.create",['category'=>$categories],['tags'=>$tags]);
    }
    // CRUD categories, CRUD tags, CRUD photo
    function store(Request $request)
    {
        // Khi insert photo, thì cho người dùng nhập photo_description 
        $title=$request->title;
        $category_id=$request->category;
        $image=$request->file('image')->store('public');
        $tag_id=$request->tags;
        $description=$request->description;

        $photo= new Photo();
        $photo->title=$title;
        $photo->image=$image;
        $photo->category_id=$category_id;
        $photo->save();

        
        $des=new PhotoDescription();
        $des->id_photo=$photo->id;
        $des->content=$description;
        $des->save();
        
        for($i=0;$i<count($tag_id);$i++)
        {
        $taggable=new Taggable();
        $taggable->photo_id=$photo->id;
        $taggable->tag_id=$tag_id[$i];
        $taggable->save();
         }

        return redirect('/admin/index');
    }
    //Update
    function edit($id)
  {
   $photos= Photo::find($id);

    return view('photos.update',["edit"=>$photos]);

  }

  function update($id, Request $request)
 {
   
    $title = $request->tile;
    $category_id = $request->category;
    $tags = $request->tags;
    $description = $request->description;
    $image =$request->file("image")->store("public");

    $photo= new Photo();
    $photo->title=$title;
    $photo->image=$image;
    $photo->category_id=$category_id;
    $photo->save();

    
    $des=new PhotoDescription();
    $des->id_photo=$photo->id;
    $des->content=$description;
    $des->save();
    
    for($i=0;$i<count($tags);$i++)
    {
    $taggable=new Taggable();
    $taggable->photo_id=$photo->id;
    $taggable->tag_id=$tags[$i];
    $taggable->save();
     }
     return redirect('/admin/index');

 }
    function destroy($id)
    {
        Photo::find($id)->delete();
        Tag::find($id)->delete();
        Category::find($id)->delete();
        return redirect('/admin/index');
    }

    
}
