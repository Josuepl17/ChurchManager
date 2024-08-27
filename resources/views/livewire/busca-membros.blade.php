<div style="display: flex; width: 100%; height: 100%; margin: 0; padding: 0; justify-content: flex-end; align-items: center;">

<a href="/cadastro/membro"><button style="padding: 5px;">Inserir</button></a>

<form action="/" method="get">
    <input wire:model.live="index2" type="search" name="pesquisa" value="{{ isset($dados) ? $dados : '' }}">

</form>



</div>
