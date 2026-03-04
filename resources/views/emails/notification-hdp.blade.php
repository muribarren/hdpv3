<h2>HDP {{ $hdp->numero }} necesita su de su participación</h2>

<p><strong>Número:</strong> {{ $hdp->numero }}</p>
<p><strong>Revisión:</strong> {{ $hdp->revision }}</p>
<p><strong>Título:</strong> {{ $hdp->titulo }}</p>
<p><strong>Cliente:</strong> {{ $hdp->nombre_cliente }}</p>

<a href="{{ url('hdp/' . $hdp->numero . '/' . $hdp->revision) }}">Ver HDP</a>
