@extends("layouts.global")

@section("title") Create New rwcandidate @endsection

@section("content")

<br><br><br><br>
  <div class="col-md-8">

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif

    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('rwcandidates.store')}}" method="POST">
      @csrf
      <label for="name">Name</label>
      <input value="{{old('name')}}" class="form-control {{$errors->first('name') ? "is-invalid": ""}}" placeholder="Full Name" type="text" name="name" id="name"/>
      <div class="invalid-feedback">
        {{$errors->first('name')}}
      </div>
      <br>
      <label for="nik">NIK</label>
      <input value="{{old('nik')}}" class="form-control {{$errors->first('nik') ? "is-invalid": ""}}" placeholder="NIK" type="text" name="nik" id="nik"/>
      <div class="invalid-feedback">
        {{$errors->first('nik')}}
      </div>
      <br>
      <label for="nomorurut">nomorurut</label>
      <input value="{{old('nomorurut')}}" class="form-control {{$errors->first('nomorurut') ? "is-invalid": ""}}" placeholder="Nomor Urut" type="text" name="nomorurut" id="nomorurut"/>
      <div class="invalid-feedback">
        {{$errors->first('nomorurut')}}
      </div>
      <br>
      <label for="rt">Name</label>
      <input value="{{old('rt')}}" class="form-control {{$errors->first('rt') ? "is-invalid": ""}}" placeholder="RT" type="text" name="rt" id="rt"/>
      <div class="invalid-feedback">
        {{$errors->first('rt')}}
      </div>
      <br>
      <label for="avatar">Avatar image</label>
      <br>
      <input id="avatar" name="avatar" type="file" class="form-control {{$errors->first('avatar') ? "is-invalid" : ""}}">
      <div class="invalid-feedback">
        {{$errors->first('avatar')}}
      </div>

      <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
  </div>

@endsection
