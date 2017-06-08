@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Spellbook creation</h2></div>

                    <form action="/createspellbook" method="POST">
                        <div class="form-group">

                            <input class="form-control" type="text" name="name" id="spellbook-name"
                                   placeholder="Name" required>

                            <input class="form-control" type="text" name="language" id="spellbook-language"
                                   placeholder="Language" required>

                            <input class='' type="hidden" name="_token" value="{{ csrf_token() }}">


                            <textarea class="form-control" name="description" placeholder="Description">

                                </textarea>

                            <label for="isPublicChkbx">Is Public?</label>

                            <input class="form-group" id='isPublicChkbx' type="checkbox" name="isPublic" value="1">

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
