<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//tambahan
use App\Http\Requests;
use Validator;
  use App\Http\Controllers\Controller;
use Session;
  use App\Comment, App\Article;
  use Illuminate\Support\Facades\Redirect;
  ////////////

class CommentsController extends Controller
{
    //
      public function index(Request $request)

    {

      $validate = Validator::make($request->all(), Comment::valid());

      if($validate->fails()) {

        return Redirect::to('articles/'. $request->article_id)

         ->withErrors($validate)

          ->withInput();

      } else {

        Comment::create($request->all());

        Session::flash('notice', 'Success add comment');

        return Redirect::to('articles/'. $request->article_id);

      }

    }

    public function store(Request $request)
    {

      $validate = Validator::make($request->all(), Comment::valid());

      if($validate->fails()) {

        return Redirect::to('articles/'. $request->article_id)

         ->withErrors($validate)

          ->withInput();

      } else {

        Comment::create($request->all());

        Session::flash('notice', 'Success add comment');

        return Redirect::to('articles/'. $request->article_id);

      }

    }



  }

