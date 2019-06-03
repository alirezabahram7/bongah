<?php
use Hekmatinasser\Verta\Verta;

$myid=0;
$str2=str_replace('"', '',$data->photo);
$str1=str_replace('[', '',$str2);
$str=str_replace(']', '',$str1);
$photoArray = explode(',',$str );
?>

@if($colcounter==1)
    <br>
    <div class="row">
@endif
        <div class="col-sm">
            <div class="col">
                <div class="card card-columns center" style="width: 18rem;">
                    <div style="position:relative;">
                        <a href="{{route('house.card',['id'=>$data->id])}}">
                            @if($data->photo!=null)
                                <img class="card-img-top" src='{{ "/pic/".$photoArray[0]}}' alt="Card image cap">
                            @else
                                <img class="card-img-top" src='/pic/noimg.png' alt="Card image cap">
                            @endif
                        </a>
                        <div style="position: absolute;left:0;top:0; background-color:rgba(255,255,255,0.2);" class="col-md-12">
                            @if(Auth::check())
                                <?php
                                    $myid=auth()->user()->id;
                                ?>
                                @if(!$data->favouritedBy(Auth::user()))
                                    <a href="{{route('fav.save',['hid'=>$data->id])}}" data-toggle="tooltip"><i onclick="tglbkmrk(this)" class="fa fa-bookmark-o center"></i></a>
                                @else
                                    <a href="{{route('fav.destroy',['hid'=>$data])}}" data-toggle="tooltip"><i onclick="tglbkmrk(this)" class="fa fa-bookmark center"></i></a>
                                @endif
                            @endif
                        </div>
                    </div>
                    <a href="{{route('house.card',['id'=>$data->id])}}">
                        <div class="card-body">
                            <?php
                                $cost=Verta::persianNumbers($data->cost);
                                $rent=Verta::persianNumbers($data->rent);
                                $meterage=Verta::persianNumbers($data->meterage);
                                $rooms=Verta::persianNumbers($data->rooms);
                            ?>
                            @if($rors==1)
                                <h5 class="card-title">قیمت:{{$cost}}  تومان</h5>
                            @else
                                <h5 class="card-title">رهن:{{$cost}}  تومان</h5>
                                <h5 class="card-title">اجاره:{{$rent}}  تومان</h5>
                            @endif
                            <p class="card-text">{{$data->address}}</p>
                            <p class="card-text">{{$data->type}} *  {{$meterage}}متری  * {{$rooms}} خوابه</p>
                            <p class="card-text">{{$data->cities['city']}} * {{$data->location['district']}}</p>
                            <div class="card-footer text-muted bluediv" dir="rtl">
                                <span class="pull-left" style="color:black;" dir="rtl">
                                    <?php
                                        $v1= Verta::now();
                                        $dt =$data->created_at;
                                        $v2=new Verta($dt);
                                        $v3=$v2->formatDifference($v1);
                                        echo Verta::persianNumbers($v3);
                                     ?>
                                </span>
                                @if($data->user['id']==$myid)
                                    <span class="pull-right"><a href="{{route('house.edit',['id'=>$data->id])}}"><i class="fa fa-edit"></i></a></span>
                                @else
                                    <a href="{{route('profile.show',['id'=>$data->user['id']])}}">
                                        <span class="pull-right">
                                            @if($data->user->profile['photo']!=null)
                                                <?php
                                                $avatar=str_replace('"', '',$data->user->profile['photo']);
                                                $avatar2="/pic/".$avatar;
                                                ?>
                                                <img title="{{$data->user['name']}}" class="img-thumbnail rounded-circle img-responsive" style="width:50px" src="{{$avatar2}}">
                                            @else
                                                <img title="{{$data->user['name']}}" class="img-thumbnail rounded-circle img-responsive" style="width:50px" src="/pic/nopro.png">
                                            @endif
                                        </span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

           