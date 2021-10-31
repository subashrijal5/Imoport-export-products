@extends('layouts.main')
@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header text-center">
            <h3>Clients</h3>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('clients.store')}}">
                {{ csrf_field() }}
                <div class="row">
                    @include('clients.fields')
            </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{route('clients.index')}}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<script type="text/javascript">
    var path = "{{ route('nationality.typeahead') }}";
    $('input.nationality').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });

</script>
@endsection
