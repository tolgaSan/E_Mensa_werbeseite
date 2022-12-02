@extends('layout')
@section('content')

    @empty($gericht)
        Keine Gerichte vorhanden!
    @endempty
    <table>
        <thead>
        <tr>
            <th>Gericht: </th>
            <th>Preis_Intern:</th>
        </tr>
        </thead>
        <tbody>

        @foreach($gericht as $key)
            <tr>
                <td>{{$key['name']}}</td>
                <td>{{$key['preis_intern']}}</td>
            </tr>
        @endforeach

        </tbody>

    </table>
@endsection