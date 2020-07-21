<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Tag;
use App\Tweet;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $tweets = Tweet::all()->sortByDesc('id');
        $tags = Tag::all();

        return view('index', compact('tweets', 'tags'));
    }

    public function store()
    {
        request()->validate(['text' => 'required|min:10']);

        $tweet = Tweet::create([
            'text' => request()->text,
            'author_id' => 1
        ]);

        $tweet->tags()->attach(request()->tags);

        return redirect(route('index'));
    }

    public function show(Tweet $tweet)
    {
        return view('tweets.show', compact('tweet'));
    }

    public function edit(Tweet $tweet)
    {
        return view('tweets.edit', compact('tweet'));
    }

    public function update(Tweet $tweet)
    {
        request()->validate(['text' => 'required|min:10']);

        $tweet->text = request()->text;
        $tweet->save();

        return redirect(route('index'));
    }

    public function destroy(Tweet $tweet)
    {
        $tweet->delete();

        return redirect(route('index'));
    }

    public function storeComment(Tweet $tweet)
    {
        request()->validate(['text' => 'required']);

        Comment::create([
            'tweet_id' => $tweet->id,
            'text' => request()->text,
            'author_id' => 1//request()->author_id
        ]);

        return redirect(route('tweet.show', $tweet->id));
    }

    public function storeTag()
    {
        request()->validate(['name' => 'required']);

        Tag::create([
            'name' => request()->name
        ]);

        return redirect(route('index'));
    }
}
