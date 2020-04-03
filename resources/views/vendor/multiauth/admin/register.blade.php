@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-user font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">Register New {{ ucfirst(config('multiauth.prefix')) }}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                        @include('multiauth::message')
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf
                        <div class="form-body">
                        <div class="form-group">
                            <label>Name</label>
                                <input id="name" type="text" class="form-control spinner{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                    required autofocus>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label>E-Mail Address</label>
                                <input id="email" type="email" class="form-control spinner{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"
                                    required>
                            </div>
                        <div class="form-group{{ $errors->has('password') ? ' text-danger' : '' }}">
                            <label>Password</label>
                                <input id="password" type="password" class="form-control spinner{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                    required>
                            </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control spinner" name="password_confirmation" required>
                            </div>
                        <div class="form-group">
                            <label for="role_id">Assign Role</label>
                                <select name="role_id[]" id="role_id" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                    <option selected disabled>Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-actions text-center">
                                <button type="submit" class="btn green">
                                    Register
                                </button>
                                <a href="{{ route('admin.show') }}" class="btn default">
                                    Back
                                </a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
