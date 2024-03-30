<table>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>ENDEREÇO</th>
                            <th>FUNÇÃO</th>
                            <th>TELEFONE</th>
                            <th style="width: 08%;">X</th>
                            <th style="width: 4%;">X</th>

                        </tr>



                        @foreach ($index as $ind)



                        <tr>

                            <td style="background-color:#0A1626 ; color:white">{{ $ind->id }}</td>
                            <td>{{ $ind->nome }}</td>
                            <td>{{ $ind->endereco }}</td>
                            <td>{{ $ind->funcao }}</td>
                            <td>{{ $ind->telefone }}</td>
                            <td>
                                <form class="formx" method="post" action="/inserir/dizimos/{{ $ind->id }}/{{ $ind->nome }}">
                                @csrf    
                                <button class="inserir">Inserir</button></form>
                            </td>
                            <td>

                                <form action="/destroy/{{$ind->id}}" method="post"><button class="excluir">X</button>
                                    @csrf
                                </form>
                            </td>

                        </tr>


                        @endforeach




                    </table>