@extends('layouts.app')
@section('content')

<!--HTML Code for Loginpage-->
<div class="container">
   <h1 class="well" align="center">Adminstration Page</h1>
   <!--Role Adddition and Deletion-->
     <div class="jumbotron">
        <form id="role" enctype="multipart/form-data" method="post" action="{{url('/roleresourceperm')}}">{!! csrf_field() !!}            
            <h3>Role Description </h3><br>
            <div class="row form-group">
                <div class="col-sm-4 col-sm form-group">                       
                    <div>
                        <label>Add New Role</label>
                        <input type="text" name="addrole"  id="addrole">
                    </div>
                </div>
                <div class="col-sm-3 from-group">
                   <select name='role' id='role' >
                        @foreach($rows as $row) 
                            <option value="{{ $row->role_name}}">
                            {{ $row->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Add">
                    <input type="submit" class="btn btn-danger" name="submit" id="submit" value="Delete"> 
                </div>
            </div>
            <!--Add new Resources here-->
            <div class="row">
                <h3>Resource Description </h3><br>
                <div class="col-sm-4 col-sm form-group">
                    <div>                      
                        <label>Add New Resource</label>
                        <input type="text" name="addresource"  id="addresource">
                    </div>
                </div>
                <div class="col-sm-3 from-group">
                    <select name='resource' id='resource' >
                        @foreach($rows as $row) 
                            <option value="{{ $row->role_name}}">
                            {{ $row->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn btn-primary" name="submit1" id="submit" value="Add">
                    <input type="submit" class="btn btn-danger" name="submit1" id="submit" value="Delete"> 
                </div>
            </div>
            <!--Add/Delete Permission here-->
            <div class="row">
                <h3>Permission Description </h3><br>
                <div class="col-sm-4 col-sm form-group">                  
                    <div>
                        <label>Add New Action</label>
                        <input type="text" name="addpermission"  id="addpermission">
                    </div>
                </div>
                <div class="col-sm-3 from-group">
                    <select name='permission' id='permission' >
                        @foreach($rows as $row) 
                            <option value="{{ $row->role_name}}">
                            {{ $row->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn btn-primary" name="submit1" id="submit" value="Add">
                    <input type="submit" class="btn btn-danger" name="submit1" id="submit" value="Delete"> 
                </div>
            </div>
        </form>
    </div>
</div>

@endsection