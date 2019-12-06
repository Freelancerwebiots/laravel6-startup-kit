@extends('layouts.front.app')
@section('content')
    <div class="container">
        <div class="justify-content-center">
            @include('layouts.alert')
            <div class="row">
                <div id="profile" class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-header">{{ __('User Profile') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input class="form-control" value="{{ $users->email }}" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $users->name }}" autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="profile_pic" class="col-md-4 col-form-label text-md-right">{{ __('Profile Photo') }}</label>

                                    <div class="col-md-6">
                                        <input id="profile_pic" type="file" class="form-control @error('profile_pic') is-invalid @enderror" name="profile_pic" onchange="readURL(this);">
                                        @if($users->profile_pic)
                                        <img src="{{url('images/profiles/'.$users->profile_pic)}}" height="100" width="100" id="profile-preview">
                                        @else
                                        <img src="{{url('images/profiles/Profile.png')}}" height="100" width="100" id="profile-preview">
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Apply Changes') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="changepassword" class="col-md-6 col-sm-12">
                   <div class="card">
                        <div class="card-header">{{ __('Change Password') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.change') }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="old-password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>

                                        @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="new-password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>

                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Change Password') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
