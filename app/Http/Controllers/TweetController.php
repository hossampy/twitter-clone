<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Welcome', [
            'tweets' => Tweet::orderBy('id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Initialize variables
        $file=null;
        $extension=null;
        $fileName=null;
        $path=null;

        // Check if the request has a file named 'image'
        if($request->hasFile('image')){
            // Get the file from the request
            $file=$request->file('image');

            // Validate the file, it should be an image and not larger than 2048 kilobytes
            $request=validate(['file'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);

            // Get the extension of the file
            $extension=$file->getClientOriginalExtension();

            // Generate a unique filename using the file's extension
            $fileName=uniqid().'.'.$extension;

            // Set the path depending on the file's extension
            $extension === 'mp4' ? $path = '/videos/' : $path = '/pics/';
        }

        // Create a new Tweet instance
        $tweet=new Tweet;

        // Set the properties of the Tweet
        $tweet->name="hossam";
        $tweet->handle="@hossam";
        $tweet->image ='https://yt3.ggpht.com/ysLHmrLE5AZ6iypekgvwdSouurPDzR6ShhKpGyrJsewZDA-HjhJEqN7oURLQ5gOwyQwmkV4B=s88-c-k-c0x00ffffff-no-rj';
        $tweet->tweet=$request->input('tweet');

        // If a filename was generated (meaning a file was uploaded)
        if ($fileName) {
            // Set the file property of the Tweet to the path of the uploaded file
            $tweet->file = $path . $fileName;

            // Set the is_video property of the Tweet depending on the file's extension
            $tweet->is_video = $extension === 'mp4' ? true : false;

            // Move the uploaded file to the appropriate directory
            $file->move(public_path() . $path, $fileName);
        }

        // Set the comments, retweets, likes, and analytics properties of the Tweet to random numbers between 5 and 500
        $tweet->comments = rand(5, 500);
        $tweet->retweets = rand(5, 500);
        $tweet->likes = rand(5, 500);
        $tweet->analytics = rand(5, 500);

        // Save the Tweet to the database
        $tweet->save();
    }
    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $tweet=Tweet::find($id);
       if (!is_null($tweet->file)&&file_exists(public_path().$tweet->file)) {
           unlink(public_path().$tweet->file);
       }
       $tweet->delete();
       return redirect()->route('tweets.index');
    }
}
