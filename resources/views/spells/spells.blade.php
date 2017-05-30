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

                        <form  action="/spells" class="form-inline">
                            <div class="form-group">

                                <select class="form-control filter-input filter-input-onchange" name="school" id="schools-sel">
                                    <option value="">Schools</option>
                                    @foreach($schools as $school)
                                        <option value="{{$school->id}}">{{$school->label}}</option>
                                    @endforeach
                                </select>

                                <select class="form-control filter-input filter-input-onchange" name="class" id="classes-sel">
                                    <option value="">Classes</option>
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{$class->label}}</option>
                                    @endforeach
                                </select>

                                <select class="form-control filter-input filter-input-onchange" name="level" id="spell-level-sel">
                                    <option value="">Spell level</option>
                                    @for($i=1; $i <10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>

                                <input class='filter-input' type="hidden" name="_token" value="{{ csrf_token() }}">

                                <input class="form-control filter-input" type="text" name="name" id="spell-search-text" placeholder="Search by spells or tags">

                            </div>
                        </form>

                        <div id="spell-table">
                            @include('spells.table')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
