<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="{{ Request::is('audio*') ? 'active' : '' }}">
    <a href="{{ route('audio.index') }}"><i class="fa fa-edit"></i><span>Audio</span></a>
</li>

<li class="{{ Request::is('bengalis*') ? 'active' : '' }}">
    <a href="{{ route('bengalis.index') }}"><i class="fa fa-edit"></i><span>Bengalis</span></a>
</li>

<li class="{{ Request::is('bengaliHoques*') ? 'active' : '' }}">
    <a href="{{ route('bengaliHoques.index') }}"><i class="fa fa-edit"></i><span>Bengali Hoques</span></a>
</li>

<li class="{{ Request::is('cats*') ? 'active' : '' }}">
    <a href="{{ route('cats.index') }}"><i class="fa fa-edit"></i><span>Cats</span></a>
</li>

<li class="{{ Request::is('catNames*') ? 'active' : '' }}">
    <a href="{{ route('catNames.index') }}"><i class="fa fa-edit"></i><span>Cat Names</span></a>
</li>

<li class="{{ Request::is('englishes*') ? 'active' : '' }}">
    <a href="{{ route('englishes.index') }}"><i class="fa fa-edit"></i><span>Englishes</span></a>
</li>

<li class="{{ Request::is('pdfs*') ? 'active' : '' }}">
    <a href="{{ route('pdfs.index') }}"><i class="fa fa-edit"></i><span>Pdfs</span></a>
</li>

<li class="{{ Request::is('qurans*') ? 'active' : '' }}">
    <a href="{{ route('qurans.index') }}"><i class="fa fa-edit"></i><span>Qurans</span></a>
</li>

<li class="{{ Request::is('suras*') ? 'active' : '' }}">
    <a href="{{ route('suras.index') }}"><i class="fa fa-edit"></i><span>Suras</span></a>
</li>

<li class="{{ Request::is('tafsirs*') ? 'active' : '' }}">
    <a href="{{ route('tafsirs.index') }}"><i class="fa fa-edit"></i><span>Tafsirs</span></a>
</li>

