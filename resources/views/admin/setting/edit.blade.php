@extends('layouts.admin.app')
@section('css')
   
@endsection
@section('content')

            <div class="justify-content-center">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="card">
                            <div class="card-header">{{ __('Edit Setting') }}</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('setting.update', $setting->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $setting->name }}" autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>

                                        <div class="col-md-6">
                                            <input id="value" type="text" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ $setting->value }}" autocomplete="value" autofocus>

                                            @error('value')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       
@endsection