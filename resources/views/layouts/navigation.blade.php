<div id="navigation">
    @php($url = str_replace(URL::to('/'),'',URL::current()))

    @if(!($url == '/home'))
    @if(!($url == '/login'))
    @if(!($url == '/register'))
    @if(!($url == ''))

    <div style="margin-top: -30px" class="container">
        <hr>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="collapse navbar-collapse" >
                        <ul class="nav navbar-nav">
                            @yield('navbar')
                        </ul>
                    </div>
                </div>
            </div>
        <hr>
    </div>

    @endif
    @endif
    @endif
    @endif
    @endif

</div>
