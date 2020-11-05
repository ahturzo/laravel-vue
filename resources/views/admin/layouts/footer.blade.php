<footer class="navbar navbar-expand footer fixed-bottom footer-dark navbar-border">
    <ul class="nav navbar-nav ml-1 mr-auto">
        <li class="nav-item">Copyright  &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://1.envato.market/pixinvent_portfolio" target="_blank">PIXINVENT </a>, All rights reserved. </li>
    </ul>
    <div class="float-right">
        <button class="btn btn-outline-danger" type="button">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                        document.getElementById('logout-form2').submit();">
                <i class="fa fa-power-off"></i> Logout
            </a>
        </button>

        <form class="form-inline" id="logout-form2" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>


</footer>
