@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Character creation</h2></div>

                    <form action="/createchar" method="POST">
                        <div class="form-group">

                            {{--
                            -- School selection form to use in the future
                            <select class="form-control filter-input filter-input-onchange" name="school" id="schools-sel">
                                <option value="">Schools</option>
                                @foreach($schools as $school)
                                    <option value="{{$school->id}}">{{$school->label}}</option>
                            @endforeach
                            </select>--}}
                            <div class="form-group">
                            <input class="form-control" type="text" name="name" id="spell-search-text"
                                   placeholder="Name">

                            <select class="form-control" name="class"
                                    id="classes-sel">
                                <option value="">Classes</option>
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->label}}</option>
                                @endforeach
                            </select>

                            <label for="char-level-sel">Level</label>
                            <select class="form-control" name="level"
                                    id="char-level-sel">
                                @for($i=1; $i <21; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            </div>

                            <input class='' type="hidden" name="_token" value="{{ csrf_token() }}">



                            <textarea class="form-control" name="description" placeholder="Description">

                            </textarea>

                            <label for="isPublicChkbx">Is Public?</label>

                            <input class="form-group" id='isPublicChkbx'type="checkbox" name="isPublic" value="1">

                            <input class="form-control" type="submit" value="Submit">

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')

@endsection
