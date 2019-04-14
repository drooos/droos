@extends('home')
@section('homeContent')
<div class="container home">
    <div class="row">
    	@foreach ($users as $user)
        <div class="col-12">
            <h1><button onclick="approveAccount({{$user->userId}})">Approve</button> {{$user->User->email}}</h1>
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