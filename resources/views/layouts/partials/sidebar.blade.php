
<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li {{Route::is('dashboard')? 'class=active':''}}>
                    <a href="{{route('dashboard')}}" class="active">
                    <i class="lnr lnr-home"></i> 
                    <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Lucratori</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages3" class="collapse ">
                        <ul class="nav">
                            @if( Auth::user()->role == '1' )
                                <li {{Route::is('mecanic/create')}}>
                                    <a href="{{route('mecanic_create')}}" class="waves-effect waves-block">
                                      <span>Adauga mecanic</span>
                                    </a>
                                </li>
                            @endif
                                <li {{Route::is('mecanic')}}>
                                    <a href="{{route('mecanic')}}" class="waves-effect waves-block">
                                      <span>Vezi mecanic</span>
                                    </a>
                                </li>
                          
                            @if( Auth::user()->role == '1' )
                                <li {{Route::is('reglarea_mecanic/create')}}>
                                    <a href="{{route('reglarea_mecanic_create')}}" class="waves-effect waves-block">
                                      <span>Adauga reglarea_mecanic</span>
                                    </a>
                                </li>
                            @endif
                            <li {{Route::is('reglarea_mecanic')}}>
                                <a href="{{route('reglarea_mecanic')}}" class="waves-effect waves-block">
                                  <span>Vezi reglarea_mecanic</span>
                                </a>
                            </li>

                            @if( Auth::user()->role == '1' )
                            <li {{Route::is('vulcanizator/create')}}>
                                <a href="{{route('vulcanizator_create')}}" class="waves-effect waves-block">
                                  <span>Adauga vulcanizator</span>
                                </a>
                            </li>
                            @endif

                            <li {{Route::is('reglarea_mecanic')}}>
                                <a href="{{route('vulcanizator')}}" class="waves-effect waves-block">
                                  <span>Vezi vulcanizator</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Service</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages" class="collapse ">
                        <ul class="nav">
                            <li {{Route::is('service/create')}}>
                                <a href="{{route('service_create')}}" class="waves-effect waves-block">
                                  <span>Adauga service</span>
                                </a>
                            </li>
                            <li {{Route::is('service/create')}}>
                                <a href="{{route('service')}}" class="waves-effect waves-block">
                                  <span>Vezi service</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Reglarea</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages1" class="collapse ">
                        <ul class="nav">
                            <li {{Route::is('reglarea/create')}}>
                                <a href="{{route('reglarea_create')}}" class="waves-effect waves-block">
                                  <span>Adauga reglarea</span>
                                </a>
                            </li>
                            <li {{Route::is('reglarea')}}>
                                <a href="{{route('reglarea')}}" class="waves-effect waves-block">
                                  <span>Vezi reglarea</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Vulcanizare</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="subPages2" class="collapse ">
                        <ul class="nav">
                            <li {{Route::is('vulcanizare/create')}}>
                                <a href="{{route('vulcanizare_create')}}" class="waves-effect waves-block">
                                  <span>Adauga vulcanizare</span>
                                </a>
                            </li>
                            <li {{Route::is('vulcanizare')}}>
                                <a href="{{route('vulcanizare')}}" class="waves-effect waves-block">
                                  <span>Vezi vulcanizare</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>

                <li {{Route::is('raport')}}>
                    <a href="{{route('raport_zilnic')}}" class="active">
                    <i class="lnr lnr-home"></i> 
                    <span>Raport</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>