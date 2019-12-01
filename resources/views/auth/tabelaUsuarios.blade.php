@extends('site.index.base')


@section('central')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <th scope="row">{{ $usuario->name }}</th>
            <td>{{ $usuario->email }}</td>
        </tr>
        @endforeach

    </tbody>
  </table>
@endsection