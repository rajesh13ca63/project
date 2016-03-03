@extends('layouts.app')
@section('content')

<div class="container">
   <h1 class="well" align="center">Adminstration Page</h1>
   <!--Role Assign to a particuler user-->
     <div class="jumbotron">
        <form id="role" enctype="multipart/form-data" method="post" action="{{url('/allusers')}}">{!! csrf_field() !!}  
            <h3>Role Description </h3><br>
                <div class="row">
                    <div class="col-sm-3 form-group">                          
                        <div>
                            <h4>Select UserId</h4>
                        </div>   
                        <select name='users' id='users' >
                            @foreach($rows as $user) 
                                <option value="{{ $user->id }}">
                                {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">  
                        <div>   
                            <h5><label>User Name</label></h5>
                            <input type="text" name="user"  id="user">
                        </div>
                    </div>
                    <!--Php code here-->
                    <div class="col-sm-3 form-group">                             
                        <div>
                            <h4>User Type</h4>
                        </div>   
                        <select name='role' id='role'>
                            @foreach($roles as $role) 
                                <option value="{{ $role->role_name }}">
                                {{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 offset-5 form-group">
                        <br/><br/>
                        <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Add">
                        <input type="submit" class="btn btn-danger" name="submit" id="submit" value="Delete"> 
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection