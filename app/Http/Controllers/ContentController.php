<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Categorie;
use App\Models\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    /**
     * Display a listing of the contents.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::with(['categorie', 'dentist'])->get();
        $categories = Categorie::all();
        // dd($contents[0]);
        return view('dentist.contents', compact('contents', 'categories'));
    }

    /**
     * Show the form for creating a new content.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('dentist.contents.create', compact('categories'));
    }

    /**
     * Store a newly created content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'content' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'dentist_id' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // dd($request);


        $content = Content::create([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
            'categorie_id' => $request->categorie_id,
            'dentist_id' => $request->dentist_id,
            'image' => 'image.png',
        ]);
        if ($request->hasFile('image')) {

            $imageName = Str::slug($request->title) . '-' . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/contents', $imageName);
            $content->image = 'storage/contents/' . $imageName;
        }
        $content->save();
        return redirect()->route('contents.index')
            ->with('success', 'Article créé avec succès!');
    }

    /**
     * Display the specified content.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        $content->load(['categorie', 'dentist']);
        return view('dentist.contents.show', compact('content'));
    }

    /**
     * Show the form for editing the specified content.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Content $content)
    {
        $categories = Categorie::all();
        return view('dentist.contents.edit', compact('content', 'categories'));
    }

    /**
     * Update the specified content in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Content $content)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'content' => 'required|string',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $content->update([
            'title' => $request->title,
            'type' => $request->type,
            'content' => $request->content,
            'categorie_id' => $request->categorie_id,
            'image' => 'image.png',
        ]);

        if ($request->hasFile('image')) {
            if ($content->image && Storage::exists('public/' . str_replace('storage/', '', $content->image))) {
                Storage::delete('public/' . str_replace('storage/', '', $content->image));
            }

            $imageName = Str::slug($request->name) . '-' . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/contents', $imageName);
            $content->image = 'storage/contents/' . $imageName;
        }

        $content->save();
        return redirect()->route('contents.index')
            ->with('success', 'Article mis à jour avec succès!');
    }

    /**
     * Remove the specified content from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()->route('contents.index')
            ->with('success', 'Article supprimé avec succès!');
    }

    /**
     * Get content by dentist
     *
     * @param  int  $dentistId
     * @return \Illuminate\Http\Response
     */
    public function getByDentist($dentistId)
    {
        $dentist = Dentist::findOrFail($dentistId);
        $contents = Content::where('dentist_id', $dentist)
            ->with('categorie')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $contents
        ]);
    }

    /**
     * Get content by category
     *
     * @param  int  $categoryId
     * @return \Illuminate\Http\Response
     */
    public function getByCategory($categoryId)
    {
        $contents = Content::where('categorie_id', $categoryId)
            ->with(['categorie', 'dentist'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data' => $contents
        ]);
    }
}
