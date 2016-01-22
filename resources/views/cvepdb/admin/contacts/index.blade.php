@extends('cvepdb.admin.layouts.default')

@section('content')
    <table class="table table-condensed table-hover">
        <tbody>
        @foreach ($contacts as $contact)
            <tr>
                <td class="font-montserrat all-caps fs-12 col-lg-2">
                    {{ $contact->first_name }} {{ $contact->last_name }}
                </td>
                <td class="font-montserrat all-caps fs-12 col-lg-3">
                    {{ $contact->email }}
                </td>
                <td class="font-montserrat all-caps fs-12 col-lg-3">
                    {{ $contact->subject }}
                </td>
                <td class="col-lg-4">
                    {{ $contact->message }}
                </td>
                <td class="col-lg-4">
                    <button class="btn btn-complete btn-cons">Create client</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $contacts->render() !!}
@endsection

@section('overlay')
@endsection

@section('quickview')
@endsection