@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Your Password') }}</div>

                <div class="card-body">
                  		
                	@if(session()->has('success'))
                		{{session()->get('success')}}
                	@endif
                  		
                	 <form method="POST" action="{{route('update.password')}}">
                        @csrf
                        <div>
                            <label>Current Password</label>
                            <input type="Password" name="current_password" class="form-control" placeholder="Current Password">
                        </div>
                        <br>
                        <div>
                            <label>New Password</label>
                            <input type="Password" name="password" class="form-control" placeholder="New Password">
                        </div>
                        <br>
                        <div>
                            <label>Confirm Password</label>
                            <input type="Password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        </div>
                        <br>
                        

                        <button type="submit" class="btn btn-dark">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
