@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach
            </ul>
        </div>
    @endif

    <form action="/clients" enctype="multipart/form-data" method="post">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="mb-3">
            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label required">Email <span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3 form-group required">
            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
            <p class="form-text text-body-secondary">Format: xxx-xxx-xxxx</p>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
            <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control" placeholder="3385 Drake Street, Ovals Village, Antigua & Barbuda">
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Company Logo <span class="text-danger">*</span></label>
            <input type="file" name="logo" id="logo" class="form-control">
            <p class="form-text text-body-secondary">Only image files (e.g. jpg, png) are allowed and files must be less than 2MB</p>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection