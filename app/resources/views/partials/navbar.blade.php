<nav class="navbar navbar-inverse">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
                Dawflix
            </a>
        </div>

        @if(Auth::check() )
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li{{ Request::is('catalog*') && !Request::is('catalog/create')? ' class=active' : ''}}>
                    <a href="{{url('/catalog')}}">
                        <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                         Catàleg
                    </a>
                </li>
                <li{{ Request::is('favorits*')? ' class=active' : ''}}>
                    <a href="{{url('/favorits')}}">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                         Favorits
                    </a>
                </li>
                <li{{ Request::is('catalog/create') ? ' class=active' : ''}}>
                    <a href="{{url('/catalog/create')}}">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        Nova pel·lícula
                    </a>
                </li>
            </ul>
            
                
            <ul class="nav navbar-nav navbar-right">  
                <li>
                    <!-- Treure això
                    <a href="{{url('logout')}}">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        Tancar sessió
                    </a>
                    -->
                    
                    <!-- Afegir això perquè el logout funcioni -->
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        Tancar sessió
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
            
            <!-- Cercar -->
            <div class="col-sm-4 col-md-4  navbar-right">
                    <form action="/catalog/cerca" class="navbar-form  navbar-form navbar-right" method="post" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Buscar" name="search" value="{{isset($search)?$search:''}}">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
        @endif
    </div>
</nav>