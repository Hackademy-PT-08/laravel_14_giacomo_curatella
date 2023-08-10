<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Image;
use App\Models\Picture;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $myPictures = User::find(auth()->user()->id)->pictures;
        return view('user.index', ['pictures'=>$myPictures]);
    }

    public function show(){

    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.create', [
            'categories'=>$categories,
            'tags'=> $tags,
        ]);
    }

    public function store(Request $request){
        //! creiamo e salviamo il record dell'articolo
        $picture = new Picture();
        $picture->title = $request->title;
        $picture->content = $request->content;
        $picture->price = $request->price;
        $picture->user_id = auth()->user()->id;
        $picture->save();

        //! gestiamo le immagini che l'utente ci passa e creaimo un record nella tabella images

        if($request->file('images')){
            $user_images = $request->file('images');
            foreach($user_images as $user_image){
                $images_table = new Image();
                $image_id = uniqid();
                $file_name = 'Article-img-' . $image_id . '.' . $user_image->extension();
                $images_table->image = $file_name;
                $images_table->image_id = $image_id;
                $images_table->picture_id = $picture->id;
                $images_table->save();
                $save_my_image = $user_image->storeAs('public', $file_name);
            }
        }

        //! gestiamo le categorie dell'articolo
        if($request->categories){
            $categories = $request->categories;
            $picture_id = Picture::find($picture->id);

            foreach($categories as $category){
                $picture_id->categories()->attach($category);
            }
        }

        //!gestiamo i tags dell'articolo
        if($request->tags){
            $tags = $request->tags;
            $picture = Picture::find($picture->id);
            foreach($tags as $tag){
                $picture->tags()->attach($tag);
            }
        }

        return redirect()->route('home');
    }

    public function edit($id)
    {
        $picture = Picture::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.edit', [
            'picture'=>$picture,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //! prendiamo il quadro da modificare attraverso l'id
        $picture_to_edit = Picture::find($id);
        $picture_to_edit->title = $request->title;
        $picture_to_edit->content = $request->content;
        $picture_to_edit->price = $request->price;
        $picture_to_edit->user_id = auth()->user()->id;
        $picture_to_edit->save();

        
        
        
        //! aggiorniamo le immagini che l'utente ci passa e creaimo un record nella tabella images
        
        if($request->file('images')){
            $user_images = $request->file('images');
            //!eliminare le foto dell'utente dal disco
            $pictures_of_item = $picture_to_edit->images;
            foreach($pictures_of_item as $picture_for_delete){
                Storage::delete('public/' . $picture_for_delete->image);
            }
            //! devo sostiture le nuove foto e non crearne nuove(mi devo far dire come si fa)
            $delete = DB::table('images')->where('picture_id', '=', $id)->delete();
            foreach($user_images as $user_image){
                $images_table = new Image();
                $image_id = uniqid();
                $file_name = 'Article-img-' . $image_id . '.' . $user_image->extension();
                $images_table->image = $file_name;
                $images_table->image_id = $image_id;
                $images_table->picture_id = $picture_to_edit->id;
                $images_table->save();
                $save_my_image = $user_image->storeAs('public', $file_name);
            }
        }

        //! aggiorniamo i tags dell'annuncio
        if($request->tags){
            //!individuiamo l'articolo da modificare
            $picture = Picture::find($id);
            //! salviamo tutti i tags dell'articolo in una variabile e con un ciclo li eliminiamo
            $tags = $picture->tags;
            foreach($tags as $tag){
                $picture->tags()->detach($tag);
            }
            //! scriviamo i record dei nuovi tag che ci passa l'utente
            $user_tags = $request->tags;
            foreach($user_tags as $tag){
                $picture->tags()->attach($tag);
            }

        }

        return redirect()->route('userHome');
    }

    public function destroy($id){
        $picture = Picture::find($id);
        //!eliminare le foto dell'utente dal disco
        $pictures_of_item = $picture->images;
        foreach($pictures_of_item as $picture_for_delete){
            Storage::delete('public/' . $picture_for_delete->image);
        }
        $picture->delete();
        return redirect()->route('userHome');
    }
}
