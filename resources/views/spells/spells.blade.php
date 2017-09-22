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


                                <select class="form-control filter-input filter-input-onchange" name="castingTime" id="casting-time-sel">
                                    <option value="">Casting time</option>
                                    <option value="immediate">Immediate</option>
                                    <option value="swift">Swift</option>
                                    <option value="standard">Standard</option>
                                    <option value="full round">Full round</option>
                                    <option value="round">In rounds</option>
                                    <option value="minute">In minutes</option>
                                    <option value="hour">In hours</option>
                                    <option value="day">In days</option>
                                    <option value="week">In weeks</option>
                                </select>

                                <div id="component-sub-form" class="form-group">
                                    Components
                                    <select class="form-control filter-input filter-input-onchange" name="verbalComponent" id="verbal-sel">
                                        <option value="">Verbal</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <select class="form-control filter-input filter-input-onchange" name="somaticComponent" id="somatic-sel">
                                        <option value="">Somatic</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <select class="form-control filter-input filter-input-onchange" name="materialComponent" id="material-sel">
                                        <option value="">Material</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>

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
