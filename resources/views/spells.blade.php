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

                        <form method="post" action="/spells/search" class="form-inline">
                            <div class="form-group">

                                <select class="form-control" name="school" id="schools-sel">
                                    <option value="">Schools</option>
                                    @foreach($schools as $school)
                                        <option value="{{$school->id}}">{{$school->label}}</option>
                                    @endforeach
                                </select>

                                <select class="form-control" name="class" id="classes-sel">
                                    <option value="">Classes</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{$class->label}}</option>
                                    @endforeach
                                </select>

                                <select class="form-control hidden" name="level" id="spell-level-sel">
                                    <option value="">Spell level</option>
                                    @for($i=1; $i <10; $i++)
                                        <option value="$i">{{$i}}</option>
                                    @endfor
                                </select>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input class="form-control" type="text" name="name" id="spell-search-text" placeholder="Search by spells or tags">

                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>

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

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
