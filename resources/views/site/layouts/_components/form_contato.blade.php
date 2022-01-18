{{ $slot }}

<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class={{ $classe }}>
    <br>
    <input name="telefone" value="{{ old('telefone')}}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" type="text" value="{{ old('email')}}" placeholder="E-mail" class={{ $classe }}>
    <br>
    <select name="motivo_contatos_id" class={{ $classe }}>
        <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$key}}" {{old ('motivo_contatos_id') == $key ? 'selected': ''}}>{{$motivo_contato}}</option>
        @endforeach

        </select>
    <br>
    <textarea name="mensagem" class={{ $classe }}>{{(old('mensagem') != '')?old('mensagem') : 'Preencha aqui a sua mensagem'}} </textarea>
    <br>
    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>


@if($errors->any())
<div style="position:absolute; top:0px; left:0px; width:100%; background:red">
    
    @foreach ($errors ->all() as $erro)
    <br>
        {{ $erro }}
    @endforeach
</div>   
@endif