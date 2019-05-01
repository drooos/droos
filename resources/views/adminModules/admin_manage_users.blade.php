@extends('home')
@section('homeContent')
<div class="container home">
    <div class="row">
        @foreach ($users as $user)
        <div class="col-lg-6">
            <div class="card col-lg-10">
                <div class="card-body">
                    <h1>{{$user->email}}</h1>
                    <button onclick="approveAccount({{$user->id}})" type="button" class="btn btn-lg btn-indigo">تفعيل</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
	function approveAccount(id){
		document.body.innerHTML += '<form id="dynForm" action="" method="post"><input type="hidden" name="name" value="' + id +'">@csrf</form>';
		document.getElementById("dynForm").submit();
	}
</script>
@endsection