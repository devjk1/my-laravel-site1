@extends ('layouts.app')

@section ('content')

    <div class="container">

        <h1 class="">Create Customer</h1>

        @if(session('message'))
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('customer.store') }}">
            @csrf
            <div class="form-group">
                <label  for="first_name">First Name</label>
                <input  id="first_name"
                        name="first_name"
                        type="text"
                        class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                        value="{{ old('first_name') }}"
                >
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label  for="last_name">Last Name</label>
                <input  id="last_name"
                        name="last_name"
                        type="text"
                        class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                        value="{{ old('last_name') }}"
                >
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label  for="email">Email address</label>
                <input  id="email"
                        name="email"
                        type="email"
                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                        value="{{ old('email') }}"
                >
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label  for="email_verification">Email verification</label>
                <input  id="email_verification"
                        name="email_verification"
                        type="email"
                        class="form-control {{ $errors->has('email_verification') ? 'is-invalid' : '' }}"
                >
                @if ($errors->has('email_verification'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email_verification') }}</strong>
                    </span>
                @endif
            </div>
            

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
