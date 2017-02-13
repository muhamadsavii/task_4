  @extends("layouts.application")

  @section("content")
<form style="border: 0px solid #a1a1a1;" action="{{ URL::to('downloadExcel') }}" class="pull-right " method="get" enctype="multipart/form-data">

        <input type="hidden" name="id_excel" value="{!! $article->id !!}">
         
          <button class="btn btn-raised btn-primary">Export To Excel</button>


        </form>
  
  <div>

    <h1>{!! $article->title !!}</h1>

    <p>{!! $article->content !!}</p>

    <i>By {!! $article->author !!}</i>

  </div>

  <div>

  <h3><i><u>Give Comments</u></i></h3>

  {!! Form::open(['route' => 'comments.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}

   

    <input type="hidden" name="article_id" value="{!! $article->id !!}">

    <div class="form-group">

      {!! Form::label('content', 'Content', array('class' => 'col-lg-3 control-label')) !!}

      <div class="col-lg-9">

      {!! Form::textarea('content', null, array('class' => 'form-control', 'rows' => 10, 'autofocus' => 'true')) !!}

        {!! $errors->first('content') !!}

      </div>

      <div class="clear"></div>

    </div>

    <div class="form-group">

      {!! Form::label('user', 'User', array('class' => 'col-lg-3 control-label')) !!}

      <div class="col-lg-9">

        {!! Form::text('user', null, array('class' => 'form-control')) !!}

      </div>

      <div class="clear"></div>

    </div>

    <div class="form-group">

      <div class="col-lg-3"></div>

      <div class="col-lg-9">

        {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}

      </div>

      <div class="clear"></div>

    </div>

  {!! Form::close() !!}

  </div>
<h2> Komentar </h2>
  @foreach($comments as $comment)

    <div style="outline: 1px solid #009688; padding: 10px; margin-bottom: 10px;">
<i style="color: #009688">{!! $comment->user !!}</i>  Mengatakan : <br></br>

      <p>{!! $comment->content !!}</p>

      

    </div>

  @endforeach

  @stop