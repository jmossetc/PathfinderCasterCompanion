@extends('spells.spells')
@section('table')
    {{$spells->links()}}
    <table style="width:100%"
           class="table table-striped table-hover table-responsive table-condensed">
        <tr>
            <th>Name</th>
            <th>School</th>
            <th>Classes</th>
            <th>Description</th>
        </tr>

        @foreach($spells as $spell)
            <tr class="spell-row-link" data-href="{{ route('spell', $spell->id) }}">
                <td>{{$spell->name}}</td>
                <td>{{$spell->schools()->select('label')->where('is_elemental', 0)->get()->first()->label}}</td>
                <td>{{$spell->spell_level}}</td>
                <td>{{$spell->short_description}}</td>
            </tr>
        @endforeach

    </table>
    {{$spells->links()}}
@endsection