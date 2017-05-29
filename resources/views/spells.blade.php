@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{asset('css/spells.css')}}">
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Spells list</div>

                    <div class="panel-body">
                        {{$spells->links()}}
                        <table style="width:100%" class="table table-striped table-hover table-responsive table-condensed table-bordered">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
