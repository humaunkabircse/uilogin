@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            	
                <div class="card-header">{{ __('Update Class') }}
                	<a href="{{route('class.index')}}" class="btn  btn-primary btn-sm" style="float:right">All Class</a>

                </div>
                
                <div class="card-body">
                	@if(session()->has('success')) 
						<div class="alert alert-success">
						  <strong>{{session()->get('success')}}</strong>.
						</div>
                	@endif
            	  	<form method="POST" action="{{route('class.update',$data->id)}}">
            	  		@csrf
						  <div class="form-group">
						    <label for="exampleInputEmail1">Class Name</label>
						    <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror" value="{{$data->class_name}}" placeholder="Your Class Name">
						    @error('class_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
						  </div>
						  <br> 
						  <button type="submit" class="btn btn-primary">Updated</button>
					</form>             
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

