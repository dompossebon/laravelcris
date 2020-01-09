@extends('templates.master')
{!! $teste ?? '' !!}
@section('conteudo-view')
    <div className="container" align="center">
        <form method="POST" action="/" onSubmit={this.onSubmit}>
            @csrf
            {{--            Terceiro pedido do teste --}}
            <table className="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>SobreNome</th>
                    <th>Email</th>
                    <th>Telefone</th>

                </tr>
                </thead>

                <tbody>
                <tr>

                    <td>
                        <div className="input-group input-group-sm mb-3">
                            <select
                                id='name'
                                name='name'
                                className={`form-control`}
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm"
                                value=''
                                onchange="this.form.submit()">
                                <option value="0"> Escolha uma Opção</option>
                                <option value="sortBy"> Crescente</option>
                                <option value="sortByDesc"> Decrescente</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div className="input-group input-group-sm mb-3">
                            <select
                                id='username'
                                name='username'
                                className={`form-control`}
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm"
                                value=''
                                onchange="this.form.submit()">
                                <option value="0"> Escolha uma Ordenação</option>
                                <option value="sortBy"> Crescente</option>
                                <option value="sortByDesc"> Decrescente</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div className="input-group input-group-sm mb-3">
                            <select
                                id='email'
                                name='email'
                                className={`form-control`}
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm"
                                value=''
                                onchange="this.form.submit()">
                                <option value=""> Escolha uma Opção</option>
                                <option value="sortBy"> Crescente</option>
                                <option value="sortByDesc"> Decrescente</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div className="input-group input-group-sm mb-3">
                            <select
                                id='phone'
                                name='phone'
                                className={`form-control`}
                                aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm"
                                value=''
                                onchange="this.form.submit()">
                                <option value=""> Escolha uma Opção</option>
                                <option value="sortBy"> Crescente</option>
                                <option value="sortByDesc"> Decrescente</option>
                            </select>
                        </div>
                    </td>

                </tr>
                </tbody>
            </table>
        </form>
        <br/>
        <h3>@if ($filter === false)
                Listagem Original
                <br/>
                Não Contém Filtro de Ordenação
            @else
                Listagem Ordenada por
                {!! $name['ordened'] ?? '' !!}
                {!! $username['ordened'] ?? '' !!}
                {!! $email['ordened'] ?? '' !!}
                {!! $phone['ordened'] ?? '' !!}
                @if ($name['order'] != null)
                    @if ($name['order'] == 'sortBy')
                        Crescente
                    @else
                        Descrescente
                    @endif
                @endif
                @if ($username['order'] != null)
                    @if ($username['order'] == 'sortBy')
                        Crescente
                    @else
                        Descrescente
                    @endif
                @endif
                @if ($email['order'] != null)
                    @if ($email['order'] == 'sortBy')
                        Crescente
                    @else
                        Descrescente
                    @endif
                @endif
                @if ($phone['order'] != null)
                    @if ($phone['order'] == 'sortBy')
                        Crescente
                    @else
                        Descrescente
                    @endif
                @endif
                <br/>
                <a href="/">Voltar Listagem Original</a>
            @endif
        </h3>
        <table className="table ">
            <thead>
            <tr>
                <th>Name</th>
                <th>UserName</th>
                <th>email</th>
                <th>phone</th>
                <td></td>
            </tr>
            </thead>
            {{--            Primeiro Pedido do teste --}}
            @foreach ($json as $jsonx)


                <tbody>
                <tr>
                    <td>{!! $jsonx['name'] !!}</td>
                    <td>{!! $jsonx['username'] !!}</td>
                    <td>{!! $jsonx['email'] !!}</td>
                    <td>{!! $jsonx['phone'] !!}</td>
                    <td><input type="button" value="Detalhes" onclick="(function(){
                            console.log('Id: {!! $jsonx['id'] !!}');
                            console.log('Nome: {!! $jsonx['name'] !!}');
                            console.log('Usuário: {!! $jsonx['username'] !!}');
                            console.log('Email: {!! $jsonx['email'] !!}');
                            console.log('Endereço / Rua: {!! $jsonx['address']['street'] !!}, Casa/Apto: {!! $jsonx['address']['street'] !!}');
                            console.log('Endereço / Cidade: {!! $jsonx['address']['city'] !!}, Cep: {!! $jsonx['address']['zipcode'] !!}');
                            console.log('Latitude: {!! $jsonx['address']['geo']['lat'] !!}, Longitude: {!! $jsonx['address']['geo']['lat'] !!}');
                            console.log('Telefone: {!! $jsonx['phone'] !!}');
                            console.log('WebSite: {!! $jsonx['website'] !!}');
                            console.log('Empresa / Nome: {!! $jsonx['company']['name'] !!}');
                            console.log('Empresa / catchPhrase: {!! $jsonx['company']['catchPhrase'] !!}');
                            console.log('Empresa / BS: {!! $jsonx['company']['bs'] !!}');
                            })()"></td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection

