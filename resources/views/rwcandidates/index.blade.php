@extends("layouts.global")
@section("title") Users list @endsection
@section("content")
<br><br><br><br>
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>NIK</b></th>
                        <th><b>Nomor Urut</b></th>
                        <th><b>Vote</b></th>
                        <th><b>RT</b></th>
                        <th><b>Avatar</b></th>
                        <th><b>Action</b></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rwcandidates as $rwcandidate)
                    <tr>
                        <td>{{$rwcandidate->name}}</td>
                        <td>{{$rwcandidate->nik}}</td>
                        <td>{{$rwcandidate->nomorurut}}</td>
                        <td>{{$rwcandidate->vote}}</td>
                        <td>{{$rwcandidate->rt}}</td>
                        <td>
                        @if($rwcandidate->avatar)
                            <img src="{{asset('storage/'.$rwcandidate->avatar)}}"width="70px"/>
                        @else
                            N/A
                        @endif
                        </td>
                        <td>
                            <a class="btn btn-info text-white btn-sm" href="{{route('rwcandidates.edit', ['id'=>$rwcandidate->id])}}">Edit</a>

                            <a href="{{route('rwcandidates.show', ['id' => $rwcandidate->id])}}" class="btn btn-primary btn-sm">Detail</a>

                            <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('rwcandidates.destroy', ['id' => $rwcandidate->id ])}}" method="POST">
                              @csrf
                              <input type="hidden" name="_method" value="DELETE">

                              <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                            </form>
                          </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="hero-app-1 custom-animation"><img src="img/animate_icon/icon_1.png" alt=""></div>
    <div class="hero-app-5 custom-animation2"><img src="img/animate_icon/icon_3.png" alt=""></div>
    <div class="hero-app-7 custom-animation3"><img src="img/animate_icon/icon_2.png" alt=""></div>
    <div class="hero-app-8 custom-animation"><img src="img/animate_icon/icon_4.png" alt=""></div>
</section>

@endsection
