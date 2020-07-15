<?php

namespace App\Http\Controllers;

use App\Tweet;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $tweets = Tweet::all();

        return view('index', compact('tweets'));
    }

    public function store()
    {
        request()->validate([
            'text' => ['required', 'min:10']
        ]);

        $tweet = new Tweet();
        $tweet->text = request()->text;
        $tweet->save();

        return redirect(route('index'));
    }

    public function edit($id)
    {
        $tweet = Tweet::findOrFail($id);

        return view('edit', compact('tweet'));
    }

    public function update($id)
    {
        request()->validate([
            'text' => ['required', 'min:10']
        ]);

        $tweet = Tweet::findOrFail($id);
        $tweet->text = request()->text;
        $tweet->save();

        return redirect(route('index'));
    }

    public function destroy($id)
    {
        Tweet::destroy($id);

        return redirect(route('index'));
    }
}
