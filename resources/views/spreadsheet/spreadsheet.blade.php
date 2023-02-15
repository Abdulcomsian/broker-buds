@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')
<div class="container">
    <div class="row p-2">
        <div class="col-12">
            <div class="card spreadsheet-table" style="height: 400px;">
                @include('spreadsheet.components.table')
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    setInterval(function(){
        $.ajax({
            type : 'POST',
            url : '{{route("get.spreadsheet.data")}}',
            datatype :  'HTML',
            data : {
                _token : '{{csrf_token()}}'
            },
            success: function(res){
                document.querySelector(".spreadsheet-table").innerHTML = res; 
            }
        })
    } , 5000 )
</script>
@endsection