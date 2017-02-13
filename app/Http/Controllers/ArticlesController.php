<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Article;
use App\Comment;
use Session;
use Excel;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $articles = Article::all();
        $articles = Article::paginate(10);

    return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //asalna   public function store(Request $request)
    
    public function store(ArticleRequest $request)
    {
        Article::create($request->all());

  Session::flash("notice", "Article success created");

  return redirect()->route("articles.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        
        //return view('articles.index')->with('articles', $article);
          
        $comments = Article::find($id)->comments->sortBy('Comment.created_at');

        return view('articles.show')->with('article', $article)->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

    return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function update(Request $request, $id)
    public function update(ArticleRequest $request, $id)
    {
        Article::find($id)->update($request->all());

    Session::flash("notice", "Article success updated");

    return redirect()->route("articles.show", $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);

    Session::flash("notice", "Article success deleted");

    return redirect()->route("articles.index");
    }

   



    public function importExcel(Request $request)

    {


        if($request->hasFile('import_file')){

            $path = $request->file('import_file')->getRealPath();

            $extension = $request->file('import_file')->extension(); // membaca ektensi file

            $data = Excel::load($path, function($reader) {})->get();
            //var_dump($extension) or die();

            if(!empty($data) && $data->count()){

                if ($extension =='ods'){
                foreach ($data->toArray() as $key => $value) {

                    if(!empty($value)){

                       foreach ($value as $v) {        
                        //$insert[] = ['title' => $value['title'], 'description' => $value['description']];
                            $insert[] = ['title' => $v['title'], 'content' => $v['content']];

                        }

                    }

                }
            }else {
                foreach ($data->toArray() as $key => $value) {

                  

                            
                        $insert[] = ['title' => $value['title'], 'content' => $value['content']];
                        
                        

                    

                }

            }

                

                if(!empty($insert)){

                    Article::insert($insert);
                    Session::flash("notice", "Insert Record successfully");
                    return redirect()->route("articles.index")->with('success','Insert Record successfully.');

                }


            }


        }


        return redirect()->route("articles.index")->with('error','Please Check your file, Something is wrong there.');

    }



    public function downloadExcel(Request $request)

    {
        $type = "xls";
        
        $id = $request->input('id_excel');
           // var_dump($id) or die();
//
        //$data = Item::get()->toArray();
        $data = Article::find($id)->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {

            $excel->sheet('mySheet', function($sheet) use ($data)

            {


                


                // setting column names for data - you can of course set it manually
                $sheet->appendRow(array_keys($data)); 
                $sheet->appendRow($data);
              
//var_dump($data) or die();
              foreach ($data as $user) {
               // var_dump($user) or die();
            //$sheet->appendRow($data);
        } 
              // $sheet->fromArray($data);
           
               

            });



        })->download($type);

    }







}
