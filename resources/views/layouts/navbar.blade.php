<div>

    <div id="navi">
        <nav class="navbar navbar-expand-md bg-light navbar-light mainnav" style="direction:rtl;">
            @if(Auth::check())
                <a class="nav-link" href="{{route('profile.show',['id'=>auth()->user()->id])}}">
                    @if(auth()->user()->photo!=null)
                        <img title="{{auth()->user()->name}}" class="img-thumbnail rounded-circle img-responsive"
                             style="width:50px" src="{{auth()->user()->photo}}">
                    @else
                        <img title="{{auth()->user()->name}}" class="img-thumbnail rounded-circle img-responsive"
                             style="width:50px" src="/pic/nopro.png">
                    @endif
                    {{auth()->user()->name}}
                </a>
            @endif

            <div class="navbar-toggler">
                <a class="nav-link" href="/"><img src="/mainImg/favicon-48.ico"
                                                  style="width: 30px;height: 30px"> بنگاه.نت
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" style="color:black;"
                    data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">

                <ul class="container navbar-nav">
                    <li class="nav-item mainnav">
                        @if($page=='h')
                            <a class="nav-link active" href="/"><img src="/mainImg/favicon-48.ico"
                                                                     style="width: 30px;height: 30px"></a>
                        @else
                            <a class="nav-link" href="/"><img src="/mainImg/favicon-48.ico"
                                                              style="width: 30px;height: 30px"></a>
                        @endif</li>
                    <li class="nav-item mainnav">
                        @if($page==1)
                            <a class="nav-link active" href="{{route('houses.show',['rors'=>1])}}">خرید</a>
                        @else
                            <a class="nav-link " href="{{route('houses.show',['rors'=>1])}}">خرید</a>
                        @endif
                    </li>

                    <li class="nav-item mainnav">
                        @if($page=='0')
                            <a class="nav-link active" href="{{route('houses.show',['rors'=>0])}}">اجاره</a>
                        @else
                            <a class="nav-link" href="{{route('houses.show',['rors'=>0])}}">اجاره</a>
                        @endif
                    </li>
                    <li class="nav-item mainnav">
                        @if($page=='p')
                            <a class="nav-link active" href="#">پیش فروش</a>
                        @else
                            <a class="nav-link" href="#">پیش فروش</a>
                        @endif
                    </li>
                    <li class="nav-item mainnav">
                        @if($page=='a')
                            <a class="nav-link active" href="{{route('agents.show')}}">مشاور یاب</a>
                        @else
                            <a class="nav-link" href="{{route('agents.show')}}">مشاور یاب</a>
                        @endif
                    </li>
                    <li class="nav-item mainnav">
                        <a class="nav-link" href="#">تخمین</a>
                    </li>
                    @if(Auth::check())
                        <li class="nav-item mainnav">
                            @if($page=='m')
                                <a class="nav-link active" href="{{route('profile.show',['id'=>auth()->user()->id])}}">بنگاه
                                    من</a>
                            @else
                                <a class="nav-link" href="{{route('profile.show',['id'=>auth()->user()->id])}}">بنگاه
                                    من</a>
                            @endif
                        </li>
                        <li class="nav-item mainnav">
                            @if($page=='f')
                                <a class="nav-link active" href="{{route('houses.fav')}}">خانه های دلخواه</a>
                            @else
                                <a class="nav-link" href="{{route('houses.fav')}}">خانه های دلخواه</a>
                            @endif
                        </li>
                        <li class="nav-item mainnav">
                            <a class="nav-link" href="/logout">خروج</a>
                        </li>
                    @else
                        <li class="nav-item mainnav">
                            @if($page=='r')
                                <a class="nav-link active" href="/register">ثبت نام</a>
                            @else
                                <a class="nav-link" href="/register">ثبت نام</a>
                            @endif
                        </li>
                        <li class="nav-item mainnav">
                            @if($page=='l')
                                <a class="nav-link active" href="/login">ورود</a>
                            @else
                                <a class="nav-link" href="/login">ورود</a>
                            @endif
                        </li>
                    @endif
                    <li class="nav-item mainnav">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>


</div>

<style>


    #infoi {
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        float: left;
    }

    #infoi {
        float: right;
        margin-right: 0;
        z-index: 10;
    }
</style>
