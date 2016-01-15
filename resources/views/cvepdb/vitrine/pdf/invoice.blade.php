@extends('cvepdb.vitrine.pdf.layouts.default')

@section('content')

    <div class="content">
        <h1>Page 1</h1>


        <table width="100%" border="1">

            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>

            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>

        </table>

    </div>

    <div class="page-break"></div>

    <div class="content">
        <h1>Page 2</h1>

        test => {!! $vendeur_name !!}
    </div>


@stop
