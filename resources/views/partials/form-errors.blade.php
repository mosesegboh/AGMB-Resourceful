@if ($errors->has())

	<div class="panel panel-danger">
		<div class="panel-heading">
	    	<h4 class="text-center" style="font-weight: bold;">Fix the errors below</h4>
		</div>
		<div class="panel-body">
		    <ul class="form-errors alert alert-danger">
		        @foreach ($errors->all() as $error)
		        <li>{!! $error !!}</li>

		        @endforeach
		    </ul>
		</div>
	</div>
@endif