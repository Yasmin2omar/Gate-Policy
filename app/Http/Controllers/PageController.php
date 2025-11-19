<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function contact(){
        return view("contact");
    }
    public function home(){
        return view("home");
    }
    public function welcome(){
        return view("welcome");
    }
    public function about(){
        return view("about");
    }
    public function create(){
        // $this->authorize("create",Post::class);
        $this->authorize(ability: "create-post");
        return view("create");
    }
    public function store(Request $request){
        // $this->authorize("create",Post::class);
        if(Gate::allows("create-post")){
        $request->validate([
            "title"=>"required|min:3|max:10",
            "content"=>"required|max:50"
        ]);
        return view("create");
    }abort(403);
    }
    
    public function update(Request $request){
        // $this->authorize("create",Post::class);
    if(Gate::allows("update-post")){
        $request->validate([
            "title"=>"required|min:3|max:10",
            "content"=>"required|max:50"
        ]);
        return view("update");
    }abort(403);
    }
    public function delete(){
        
    if(Gate::allows("delete-post")){
        return view("delete");
    }
    }
}
