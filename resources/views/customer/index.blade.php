@extends ('layouts.app')

@section ('content')

    <div class="container">
        <div class="row mb-1">
            <div class="col">
                <a  href="{{ route('customer.create') }}"
                    class="btn btn-primary"
                >
                    Create
                </a>
            </div>
        </div>

        {{-- try api route, instead of web route --}}

        <div class="row">
            <div class="col">
                <admin-table
                    :table-data="{{ $customers }}"
                    route="{{ route('customer.index') }}"   {{-- $attrs, pass in unassigned attribute route --}}
                ></admin-table>
            </div>
        </div>


    </div>

    {{-- @foreach ($customers as $customer)

        <div>
            <a href="{{ route('customer.show', ['customer' => $customer]) }}">
                {{ $customer->first_name . ' ' . $customer->last_name }}
            </a>
        </div>

    @endforeach
    {{ $customers->links() }}
    --}}

@endsection
