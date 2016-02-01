@extends('cvepdb.admin.layouts.default')

@section('content')

    <table class="table table-condensed table-hover">
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td class="font-montserrat all-caps fs-12 col-lg-2">
                    {{ $user->first_name }} {{ $user->last_name }}
                </td>

                <td class="font-montserrat all-caps fs-12 col-lg-3">
                    {{ $user->email }}
                </td>

                <td class="col-lg-4">
                    <button class="btn btn-complete btn-cons">Edit</button>
                    <button class="btn btn-complete btn-cons">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {!! $users->render() !!}

@endsection
