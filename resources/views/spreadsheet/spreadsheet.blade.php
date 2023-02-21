@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row" style="overflow-x: auto; max-height: 560px">
        <div class="col-12" style="padding-left: 0">
            <!-- <div class="card spreadsheet-table" > -->
            <div class="card " >

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