@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h5>{{$spell->name}}</h5></div>

                    <div class="panel-body">

                       <?php echo $spell->full_text ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
