@extends("layouts.application")
@section("content")



<h3>Import File Form:</h3>

				<form style="margin-top: 15px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


					<input type="file" name="import_file" />

					{{ csrf_field() }}

					<br/>


					<button class="btn btn-primary" style = "background: mediumaquamarine none repeat scroll 0 0">Import CSV or Excel File</button>


				</form>
				




@stop
