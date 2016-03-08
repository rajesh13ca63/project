@extends('layouts.app')
@section('content')
<div class="container">
	<title>Gridview using jQuery DataTable plugin</title>
	<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	   <table id="list_records"></table> 
	<div id="perpage"></div>
</div>
<div class="well">
	<p id ="tweets"></p>
</div>

@endsection
