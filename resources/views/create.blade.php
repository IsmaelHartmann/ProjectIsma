@extends('template.template')

@section('content')
    <h1 class="text-center">@if(isset($mov)) Editar @else Cadastrar @endif</h1> <hr>

    <div class="col-8 m-auto">

        @if(isset($mov))
            <form name="formEdit" id="formEdit" method="post" action="{{url("movimentacoes/$mov->id")}}">
                @method('PUT')
        @else
            <form name="formCad" id="formCad" method="post" action="{{url('movimentacoes')}}">
        @endif
        @csrf

             <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Descrição:"
                               value="{{$mov->descricao ?? ''}}"><br>
             <input class="btn btn-primary" type="submit" value="Cadastrar">
             </form>
    </div>

@endsection


