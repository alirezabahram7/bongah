<!DOCTYPE html>
<div lang="en">
    @include('layouts/header')
    <body>
        @include('layouts/navbar')
        <hr>
        <div class="container pb-3">
            <div class="row bg-secondary d-flex flex-column">
                <div class="">
                    <div class="d-flex justify-content-center text-light">
                        <h1>{{$user->name}}</h1>
                    </div>
                    <div class="col-sm-2 align-content-center">
                        <a class="justify-content-center">
                            @if($user->profile['photo']!=null)
                                <?php
                                $avatar = str_replace('"', '', $user->profile['photo']);
                                $avatar2 = "/pic/" . $avatar;
                                ?>
                                <img title="profile image" class="img-thumbnail rounded-circle img-responsive"
                                     src="{{$avatar2}}">
                            @else
                                <img title="profile image" class="img-thumbnail rounded-circle img-responsive"
                                     src="/pic/nopro.png">
                            @endif
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-flex justify-content-end">
                    <div class="star-rating">
                        <span class="fa fa-star-o" data-rating="1"></span>
                        <span class="fa fa-star-o" data-rating="2"></span>
                        <span class="fa fa-star-o" data-rating="3"></span>
                        <span class="fa fa-star-o" data-rating="4"></span>
                        <span class="fa fa-star-o" data-rating="5"></span>
                        <?php
                        $score = ($user->profile['score']) / 20;
                        ?>
                        <input type="hidden" name="whatever1" class="rating-value" value={{$score}}>
                    </div>
                </div>
                <style>
                    .star-rating {
                        line-height: 32px;
                        font-size: 1.25em;
                    }

                    .star-rating .fa-star {
                        color: yellow;
                    }
                </style>
                <script>
                    var $star_rating = $('.star-rating .fa');

                    var SetRatingStar = function () {
                        return $star_rating.each(function () {
                            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                                return $(this).removeClass('fa-star-o').addClass('fa-star');
                            } else {
                                return $(this).removeClass('fa-star').addClass('fa-star-o');
                            }
                        });
                    };

                    $star_rating.on('click', function () {
                        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
                        return SetRatingStar();
                    });

                    SetRatingStar();
                    $(document).ready(function () {

                    });
                </script>
            </div>
            </br><br><br>

            <div class="d-flex justify-content-between">
                <div class="col-sm-4 position-sticky sticky-top"><!--left col-->
                    <ul class="list-group">
                        <li class="list-group-item text-muted">نمایه کاربر</li>
                        <li class="list-group-item text-right"><span class="pull-left">{{$user->created_at}}</span><strong>عضویت</strong>
                        </li>
                        <li class="list-group-item text-right"><span
                                    class="pull-left">{{$user->profile['fname']}} {{$user->profile['lname']}}</span><strong>نام</strong>
                        </li>
                        @if($user->profile['isagent']==1)
                            <li class="list-group-item text-right"><span
                                        class="pull-left">مشاور</span><strong>کاربر</strong></li>
                        @else
                            <li class="list-group-item text-right"><span class="pull-left">عادی</span><strong>کاربر</strong>
                            </li>
                        @endif
                        @if($user->profile['isbongah']==1)
                            <li class="list-group-item text-right"><span class="pull-left">بنگاه</span><strong>نوع
                                    همکاری</strong></li>
                        @else
                            <li class="list-group-item text-right"><span class="pull-left">فرد حقیقی</span><strong>نوع
                                    همکاری</strong></li>
                        @endif

                    </ul>
                    </br></br>
                    <ul class="list-group text-right">
                        <li class="list-group-item text-center font-weight-bold bg-secondary text-light"><i
                                    class="fa fa-address-card fa-1x"></i></li>
                        <li class="list-group-item"><i class="fa fa-at"></i><a href="mailto:{{$user->email}}?subject=bongah.net"><strong>{{$user->email}}</strong></a></li>
                        <li class="list-group-item"><i class="fa fa-phone-square"></i><strong>
                                <a href="tell:{{$user->profile['phonenum']}}">{{$user->profile['phonenum']}}</a>
                            </strong>
                        </li>
                    </ul>
                    </br></br>
                </div><!--/col-3-->
                <?php
                $myid = 0;
                ?>
                @if(Auth::check())
                    <?php
                    $myid = auth()->user()->id;
                    ?>
                @endif
                @if($user->id==$myid)
                    <div class="col-sm-8 bg-light">
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="active">
                                <a href="{{route('profile.edit',['id'=>$myid])}}">
                                    <span class="pull-left">
                                        <i class="fa fa-edit">
                                        </i>
                                    </span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="/inserthouses">
                                    <span class="pull-left">
                                        <i class="fa fa-plus-square">
                                        </i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <h2 class="bg-secondary p-3 text-light text-center">دسترسی های من</h2>
                        <div class="table-responsive">
                            <table class="table table-hover text-right">
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="{{route('profile.edit',['id'=>$myid])}}"><i
                                                        class="pull-right fa fa-edit"></i></br><h5>ویرایش مشخصات نمایه</h5>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="/inserthouses">
                                                <i class="pull-right fa fa-plus-square"></i></br><h5>افزودن خانه برای فروش
                                                    یااجاره</h5>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('myhouses.show')}}">
                                                <i class="pull-right fa fa-home"></i></br><h5>مدیریت خانه های من</h5>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{route('houses.fav')}}">
                                                <i class="pull-right fa fa-bookmark"></i></br><h5>خانه های دلخواه من</h5>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center p-3">
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-trash"></i>
                                حذف پروفایل
                            </button>
                       </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width:100%">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">تایید حذف</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        آیا از حذف پروفایل خود مطمئن هستید ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">خير</button>
                                        <a href="{{route('profile.delete',['id'=>$myid])}}">
                                            <button type="button" class="btn btn-danger">بله</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <?php
                    $colcounter = 0;
                    ?>
                    <div class="pull-right col-sm-9" style="width:100%">
                        @foreach($houses as $key => $data)
                            <?php
                            if($colcounter >= 2){
                                $colcounter = 0;
                                echo"</div>";
                             }
                            ?>
                            @if($data->user_id==$user->id)
                                <?php
                                $colcounter = $colcounter + 1;
                                if ($data->RentorSell == 1) {
                                    $rors = 1;
                                } else {
                                    $rors = 0;
                                }
                                ?>
                                @include('layouts/housecards')
                            @endif
                        @endforeach
                    </div>
                @endif

            </div><!--/row-->
        </div>
    </body>
</div>
    @include('layouts/footer')

</html>