<!DOCTYPE html>
<html>
<head>
    <title>Save data in Redis</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <a type="button" href="{{ url('/') }}">Home</a>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                    <tr>
                        <th>KEYS</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($redisKeys as $redisKey)
                        <tr>
                            <td>{{ $redisKey }}
                                <form method="post" action="delete/redis/{{ $redisKey }}">
                                    @csrf
                                    @method('DELETE')
                                    <button style="float:right; margin-right: 5px;" type="submit"
                                            class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush
