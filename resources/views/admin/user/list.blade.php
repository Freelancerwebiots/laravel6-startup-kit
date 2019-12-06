@extends('layouts.admin.app')
@section('css')
   
@endsection
@section('title')
    User List
@endsection
@section('content')
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($users as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>@if($data->is_active == 1 && $data->email_verified_at != NULL ) <span  class="badge badge-success">Active</span> @else <span class="badge badge-danger"> Blocked </span> @endif</td>
                <td>
                	<form method="post" action="{{route('user.action',$data->id)}}" onsubmit="return confirm('Are you sure?')"> 
                		@csrf
                		<button type="submit" name="action" value="delete" class="btn btn-primary pr-2" >Delete</button>
                		@if($data->is_active == 1  && $data->email_verified_at != NULL)
                        <button type="submit" name="action" value="block" class="btn btn-danger"> Block </button>
                        @else
                        <button type="submit" name="action" value="active" class="btn btn-primary"> Activate </button>
                        @endif
                	</form>
                  </td>
            </tr>
            @endforeach
        </tbody>
    </table>
      
@endsection
@section('script')
	
@endsection