@extends('template.template')

@section('content')

    <div class="text-center mt-3 mb-4">
        <a href="{{url('movimentacoes/create')}}">
            <button class="btn btn-success">Cadastrar teste deu</button>

        </a>
    </div>
    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Descrição</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($mov as $movs)

                <tr>
                    <th scope="row">{{$movs->id}}</th>
                    <td>{{$movs->descricao}}</td>
                    <td>
                        <a href="{{url("movimentacoes/$movs->id")}}">
                            <button class="btn btn-dark">Visualizar</button>
                        </a>

                        <a href="{{url("movimentacoes/$movs->id/edit")}}">
                            <button class="btn btn-primary">Editar</button>
                        </a>

                        <form method="POST" action="{{url("movimentacoes/$movs->id")}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                           <button class="btn btn-danger type="submit">Deletar</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
