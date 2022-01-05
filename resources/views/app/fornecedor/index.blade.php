<h3> Fornecedores </h3>

@isset($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor) 
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ??'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ??'' }}
        <br>
        @if($loop->first)
        Primeira interação do Loop
    @endif
    @if($loop->last)
        Última interação do Loop
    @endif
    <br>
    Total de registros{{ $loop->count }}
        <hr>
        @empty
        Não exitem fornecedores cadastrados!!!
        <br>
   
    @endforelse
@endisset