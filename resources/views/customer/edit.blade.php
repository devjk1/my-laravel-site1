@extends ('layouts.app')

@section ('content')

    <div class="container">

        <h1 class="">Edit Customer {{ $customer->id }}</h1>

        @if(session('message'))
            <div class="alert alert-danger" role="alert">
                {{ session('message') }}
            </div>
        @endif

        {{ Form::model($customer, ['method' => 'PUT', 'route' => ['customer.update', $customer]]) }}

        <div class="form-group">
            {{ Form::label('first_name', 'First Name') }}
            {{ Form::text('first_name', $customer->first_name, [
                'required',     /* remove 'required' to test if $errors->has() is working */
                'class' => [
                    'form-control',
                    $errors->has('first_name') ? 'is-invalid' : '',
                ]])
            }}
            @if ($errors->has('first_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('last_name', 'Last Name') }}
            {{ Form::text('last_name', $customer->last_name, [
                'required',
                'class' => [
                    'form-control',
                    $errors->has('last_name') ? 'is-invalid' : '',
                ]])
            }}
            @if ($errors->has('last_name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::text('email', $customer->email, [
                'required',
                'class' => [
                    'form-control',
                    $errors->has('email') ? 'is-invalid' : '',
                ]])
            }}
            @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>

        {{ Form::submit('Submit') }}

        {{ Form::close() }}

    </div>

@endsection
