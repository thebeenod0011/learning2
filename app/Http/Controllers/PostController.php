<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post = Post::get();
        return response()->json([
            'message' => 'List of all post',
            'data' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return response()->json([
            'message'=> 'Post Saved Successfully',
            'data' =>$post
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            //Single Record Finding
            $post = Post::findOrFail($id);
            return response()->json([
                'message'=> 'Single Post',
                'data'=> $post
            ]);

        }catch (\Exception $e){
            return response()->json([
                'message'=>'Error',
                'Error: '=>$e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
       try{
           $post = Post::findOrFail($id);
           $post->title = $request->title ?? $post->title;
           $post->description = $request->description ?? $post->description;
           $post->save();
   
           return response()->json([
               'message' => 'Updated Successfully , Updated data is as follows:',
               'data' => $post
           ]);
       }catch(\Exception $e){
        return response()->json([
            'message' => 'Error Invalid Record',
            'Error: ' => $e->getMessage()
        ]);
       }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        if(!$post){
            return response()->json([
                'message' => 'Invalid Id, Record Not Found'
            ]);
        }

        $post->delete();
        return response()->json([
            'message' => 'Post Deleted Successfully of given id',
            'Deleted Id' =>$post->id
        ]);
    }
}
