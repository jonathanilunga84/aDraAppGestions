<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free-5.15.3-web/css/all.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/styles/simple.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/styles/myCss.css')}}" />
        <script nonce="8446f7b1-8cc9-491d-8b2d-b3aced454205">(function(w,d){!function(a,e,t,r,z){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zarazData.tracks=[],a.zaraz={deferred:[]};var s=e.getElementsByTagName("title")[0];s&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.dataLayer=a.dataLayer||[],a.zaraz.track=(e,t)=>{for(key in a.zarazData.tracks.push(e),t)a.zarazData["z_"+key]=t[key]},a.zaraz._preSet=[],a.zaraz.set=(e,t,r)=>{a.zarazData["z_"+e]=t,a.zaraz._preSet.push([e,t,r])},a.dataLayer.push({"zaraz.start":(new Date).getTime()}),a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r);z.defer=!0,z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);
        </script>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            <!-- Nav header -->
                @include('Pages.MyInclude.DashboardHeader')
            <!-- /End Nav header -->

            <!-- Sider menu de gauche -->
                @include('Pages.MyInclude.DashboardSiderGauche')
            <!-- /End Sider menu de gauche -->

            <!-- Content -->
            <div class="content-wrapper">
                <div class="content-header">
                    @yield('ContentHeader')
                </div>

                <div class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- /End Content -->

            <!-- Sider menu de droite -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div -->
                <div class="cardM card-primaryM card-outlineM border-Adra bg-dark">
                    <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle" src="{{asset('assets/images/user.png')}}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center illipsis">{{ userFullName() }}</h3>

                        <!-- p class="text-muted text-center">Software Engineer</p -->

                        <ul class="list-group list-group-unborderedM bg-dark mb-3">
                            <li class="list-group-item">
                                <a href="#" class="d-flex align-items-center float-rightM"><i class="fa fa-lock pr-2"></i><b>Mot de passe</b></a>
                            </li>
                            <li class="list-group-item">
                                <a href="#" class="d-flex align-items-center float-rightM"><i class="fa fa-user pr-2"></i><b>Mon profile</b></a>
                            </li>
                        </ul>
                        <a class="btn btn-primaryM btn-block btnAdra" href="{{route('logout')}}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><b>Déconnexion</b></a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </aside>
            <!-- /End Sider menu de droite -->

            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    Adventist Development Relief And Agency 
                </div>
                <strong>Copyright &copy; 2022 <a href="#">ADRA</a>.</strong> tout droit reservé.
            </footer>
        </div>
        <script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/js/adminlte.min.js')}}" type="text/javascript"></script>
    </body>
</html>
