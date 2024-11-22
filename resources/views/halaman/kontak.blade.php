@extends('layout/aplikasi')

@section('konten')

<h1>{{ $judul }}</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi maxime ab ipsam repudiandae,
optio dolore placeat architecto dolores soluta. Incidunt?</p>
<p>
    <ul>
        <li>Email : {{ $kontak['email'] }}</li>
        <li>Youtube : {{ $kontak['youtube'] }}</li>
    </ul>
</p>

@endsection
