@extends('layouts.admin.app')
@section('title')
    Settings
@endsection
@section('content')
	<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($setting as $data)
            <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->value }}</td>
                <td class="d-flex">
                    <a href="{{route('setting.edit', $data->id)}}" class="btn btn-primary"> Edit </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('script')
	
@endsection