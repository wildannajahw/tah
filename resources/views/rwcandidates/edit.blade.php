@extends('layouts.global')

@section('title') Edit rwcandidate @endsection

@section('content')
<div class="col-md-8">
  @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif
  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('rwcandidates.update', ['id'=>$rwcandidate->id])}}" method="POST">
    @csrf
    <input type="hidden" value="PUT" name="_method">
    <label for="name">Name</label>
    <input value="{{old('name') ? old('name') : $rwcandidate->name}}" class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
    <div class="invalid-feedback">
      {{$errors->first('name')}}
    </div>
    <br>
    <label for="nik">NIK</label>
    <input value="{{$rwcandidate->nik}}" class="form-control {{$errors->first('nik') ? "is-invalid": ""}}" placeholder="NIK" type="text" name="nik" id="nik"/>
    <div class="invalid-feedback">
      {{$errors->first('nik')}}
    </div>
    <br>
    <label for="nomorurut">nomorurut</label>
    <input value="{{$rwcandidate->nomorurut}}" class="form-control {{$errors->first('nomorurut') ? "is-invalid": ""}}" placeholder="Nomor Urut" type="text" name="nomorurut" id="nomorurut"/>
    <div class="invalid-feedback">
      {{$errors->first('nomorurut')}}
    </div>
    <br>
    <label for="rt">RT</label>
    <input value="{{$rwcandidate->rt}}" class="form-control {{$errors->first('rt') ? "is-invalid": ""}}" placeholder="RT" type="text" name="rt" id="rt"/>
    <div class="invalid-feedback">
      {{$errors->first('rt')}}
    </div>
    <br>
    <label for="avatar">Avatar image</label>
    <br>
    Current avatar: <br>
    @if($rwcandidate->avatar)
      <img src="{{asset('storage/'.$rwcandidate->avatar)}}" width="120px" />
      <br>
    @else
      No avatar
    @endif
    <br>
    <input id="avatar" name="avatar" type="file" class="form-control">
    <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
    <input class="btn btn-primary" type="submit" value="Simpan"/>
  </form>
</div>
@endsection
