@include('/partials.navbar')

<h3>Contato (view2)</h3>

<ul>
    <li>
       <a href="{{ route ('site.index')}}" > Principal </a>
    </li>
    <li>
     <a href="{{ route ('site.sobrenos')}}"  > Sobre Nós </a>
    </li>
    <li>
       <a href="{{ route ('site.contato')}}" > Contato </a>
    </li>
</ul>