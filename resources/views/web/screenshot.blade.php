@extends('layouts.main')
@section('content')
<div class="container" style="margin-top: 2%">
	<div id="main">
	<form id="savecontrolcodeform" enctype="multipart/form-data" role="form">
	{!! Form::open(array('url'=>'saveimage','id'=>'saveimage', 'class'=>'form-signup', 'role'=>'form', 'files'=>true)) !!}
		<div class="form-group pdiv">
			<label for="image_name" class="slabel">Enter name of image:</label>
			<h4 id="imgname"></h4>
			<h4 class="plabel">Image Name</h4>
			<input id="image_name" name="image_name" class="form-control" placeholder="Enter Name of Image"/>
		</div>
			<button id="savecodebutton" class="btn btn-default">Save Order</button>
			<button id="resetbutton" class="btn btn-default right form-inline pull-right">Reset</button>
			<a target="_blank" id="viewbutton" class="btn btn-default right form-inline pull-right">View</a>
			
	{!! Form::close() !!}
	<div id="palert" class="alert alert-danger text-center" role="alert"><p>No Image Pasted</p></div>
	<div id="prcode" contenteditable="true"> 
		 <p class="text-center">Click Alt + PrtScn button on keyboard on Windows
		 or
		 Click Command Control Shift #3 on Mac 
		 
		 then Paste Image Here</p>
	</div>
</div>
