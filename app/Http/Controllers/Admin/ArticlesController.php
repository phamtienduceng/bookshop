<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(isset($_GET['artcate'])){
            $artcate = $_GET['artcate'];

            if($artcate == '1'){
                $articles = Articles::where('artcat_id', '1')->get();
            }elseif($artcate == '2'){
                $articles = Articles::where('artcat_id', '2')->get();
            }elseif($artcate == '3'){
                $articles = Articles::where('artcat_id', '3')->get();
            }elseif($artcate == '4'){
                $articles = Articles::where('artcat_id', '4')->get();
            }elseif($artcate== '5'){
                $articles = Articles::where('artcat_id', '5')->get();
            }elseif($artcate== '5'){
                $articles = Articles::where('artcat_id', '6')->get();
            }elseif($artcate == '8'){
                $articles = Articles::all();
            }
        }else{
            $articles = Articles::all();
        }
        return view('admin.articles.view', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cates = ArticleCategory::all();
        return view('admin.articles.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $articles = $request->all();
        $articles['slug'] = \Str::slug($request->title);

        if($request->hasFile('photo'))
        {
            $file = $request -> file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = ArticleCategory::all();
                return view('admin.articles.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        }else
        {
            $imgName = null;
        }

        if($request->hasFile('photo1'))
        {
            $file = $request -> file('photo1');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = ArticleCategory::all();
                return view('admin.articles.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName1 = $file->getClientOriginalName();
            $file->move('images', $imgName1);
        }else
        {
            $imgName1 = null;
        }

        if($request->hasFile('photo2'))
        {
            $file = $request -> file('photo2');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = ArticleCategory::all();
                return view('admin.articles.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName2 = $file->getClientOriginalName();
            $file->move('images', $imgName2);
        }else
        {
            $imgName2 = null;
        }

        $articles['image'] = $imgName;
        $articles['image1'] = $imgName1;
        $articles['image2'] = $imgName2;

        $request->validate([
            'title' => 'required|between: 3, 150',
            'content' => 'required|between: 50, 3000',
            'artcat_id' =>'required'
        ],
        [
            'title.required' => 'Title is required.',
            'title.between' => 'Title must be between 3 and 150 characters.',
            'content.required' => 'content is required.',
            'content.between' => 'content must be between 50 and 3000 characters.',
            'artcat_id.required' => 'article_category_id is required.',
        ]);


        Articles::create($articles);
        return redirect()->route('article.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Articles $article)
    {
        $cates = Category::all();
        return view('admin.articles.edit', compact('cates', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Articles $article)
    {
        $articles = $request->all();
        $articles['slug'] = \Str::slug($request->title);

        if($request->hasFile('photo'))
        {
            $file = $request -> file('photo');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = ArticleCategory::all();
                return view('admin.articles.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName = $file->getClientOriginalName();
            $file->move('images', $imgName);
        }else
        {
            $imgName = null;
        }

        if($request->hasFile('photo1'))
        {
            $file = $request -> file('photo1');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = ArticleCategory::all();
                return view('admin.articles.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName1 = $file->getClientOriginalName();
            $file->move('images', $imgName1);
        }else
        {
            $imgName1 = null;
        }

        if($request->hasFile('photo2'))
        {
            $file = $request -> file('photo2');
            $ext = $file->getClientOriginalExtension();
            if($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg')
            {
                $cates = ArticleCategory::all();
                return view('admin.articles.create')
                    ->with('error', 'only jpg, png or jpeg');
            }
            $imgName2 = $file->getClientOriginalName();
            $file->move('images', $imgName2);
        }else
        {
            $imgName2 = null;
        }

        $articles['image'] = $imgName;
        $articles['image1'] = $imgName1;
        $articles['image2'] = $imgName2;

        $request->validate([
            'title' => 'required|between: 3, 150',
            'content' => 'required|between: 50, 3000',
            'artcat_id' =>'required'
        ],
        [
            'title.required' => 'Title is required.',
            'title.between' => 'Title must be between 3 and 150 characters.',
            'content.required' => 'content is required.',
            'content.between' => 'content must be between 50 and 3000 characters.',
            'artcat_id.required' => 'article_category_id is required.',
        ]);
        $article->update($articles);
        return redirect()->route('articles.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Articles $article)
    {
        $article->delete();
        return redirect()->route('article.view');
    }
}
