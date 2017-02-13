@extends("layouts.application")

@section("content")

  <div class="row">

    <h2 class="pull-left">List Articles</h2>

  {!! link_to(route("articles.create"), "Create", ["class"=>"pull-right btn btn-raised btn-primary"]) !!}



				<form style="border: 0px solid #a1a1a1;" action="{{ URL::to('importExcel') }}" class="pull-right " method="get" enctype="multipart/form-data">



					<button class="btn btn-raised btn-primary">Import CSV or Excel File</button>


				</form>
  
  </div>

  @include('articles.list')

@stop

