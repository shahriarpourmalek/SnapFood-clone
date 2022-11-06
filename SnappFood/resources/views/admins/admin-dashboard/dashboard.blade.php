@extends('layouts.admin-layout.main')



@section('content')
<h2 class="flex flex-row justify-center" >
    Hello {{$user->name}}
</h2>
@endsection
