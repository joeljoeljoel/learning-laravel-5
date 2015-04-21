<?php
namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticlesController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['only' => ['create']]);
    }

    /**
     * Description
     * @return type
     */
    public function index() {
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Description
     * @param type $id
     * @return type
     */
    public function show($id) {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Description
     * @return type
     */
    public function create() {
        return view('articles.create');
    }

    /**
     * Description
     * @param type ArticlesRequest $request
     * @return type
     */
    public function store(ArticlesRequest $request) {
        $article = new Article($request->all());

        \Auth::user()->articles()->save($article);

        return redirect('articles');
    }

    /**
     * Description
     * @param type $id
     * @return type
     */
    public function edit($id) {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));
    }

    public function update($id, ArticlesRequest $request) {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }

}
