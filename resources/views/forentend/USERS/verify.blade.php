@extends('layouts.app')

@section('content')
<div class="container">
    <h1>    {{ $data['code']}}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('verify') }}</div>

                    <form method="post" action="postverfiy">

                    	    <div class="card-body">
                	  <div class="form-group row">
                	     @csrf
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('code ') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('verify') }}
                                </button>
                            </div>
                        </div>
                    	
                    </form>
                    <div class="curd-footer">
                    	

                        <form method="post" action="request_new_code">
                       @csrf
                            
                        <input type="hidden" name="new_email" value="{{$data['email'] }}">
                        <input type="hidden" name="new_phone" value="{{$data['phone'] }}">
                  
                        <input type="submit" name="new_code" value="send new code "> 
                        </form>
                    </div>
                
      </div>
    
      </div>

  </div>
@endsection

 