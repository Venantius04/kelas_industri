@extends('layouts')
@section('title', 'Elequent')
@section('main')
@if(isset($success))
    <p>berhasil!!</p>
@endif
    <form action="{{ url('/user') }}" method="POST" style="margin-bottom: 4rem">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        Name:
        <input type="text" name="name" value="{{ old('name') }}" autocomplete="off" autofocus>
        @error('name')
        <span style="color: red">{{ $message }}</span>
        @enderror
        email:
        <input type="text" name="email" autocomplete="off">
        @error('email')
        <span style="color: red">{{ $message }}</span>
        @enderror
        password:
        <input type="text" name="password" autocomplete="off" >
        @error('password')
        <span style="color: red">{{ $message }}</span>
        @enderror


        <button type="submit">KIRIM DATA</button>
</form> 
<table border="1" style="width: 1000px" cellspacing="0" cellpadding="10">
    <tr>
        <th>No</th>
        <th>name</th>
        <th>email</th>
        <th>button</th>
    </tr>
    @php
        $i = 1
    @endphp 
    @foreach ($data as $item)
    <tr>
        <td>{{ $i }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td style="display: flex">
            <form action="{{ url('/user/delete-user/' . $item->id) }}" method="POST">
                @method("DELETE")
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit">Hapus</button>
            </form>
            <form action="{{ url('/user/update-user/' . $item->id) }}" method="POST">
                @method("PATCH")
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                name :
                <input type="text" name="name">
                email :
                <input type="email" name="email">
                
                <button type="submit">Edit</button>
            </form>
        </td>
    </tr>
    @php
        $i++
    @endphp 
    @endforeach
</table>
@endsection