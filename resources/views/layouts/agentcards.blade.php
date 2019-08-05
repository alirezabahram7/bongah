@if($colcounter==1)
    <br>
    <div class="row">

        @endif
        <div class="col-sm">
            <a href="{{route('profile.show',['id'=>$data->user_id])}}">
                <div class="col">
                    <div class="card card-columns pull-right text-right" style="width: 18rem;">
                        @if($data->photo!=null)
                            <?php
                            $str2 = str_replace('"', '', $data->photo);
                            $str1 = str_replace('[', '', $str2);
                            $str = str_replace(']', '', $str1);
                            ?>
                            <img class="card-img-top" src='pic/{{$str}}' alt="Card image cap">
                            {{$str}}
                        @else
                            <img class="card-img-top" src='/pic/noimg.png' alt="Card image cap">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">نام مشاور: {{$data->user->name}}  </h5>
                            @if($data->isbongah==1)
                                <p class="card-text font-weight-bold">ارائه دهنده: بنگاه</p>
                            @else
                                <p class="card-text font-weight-bold">ارائه دهنده: شخصی</p>
                            @endif
                            <p class="card-text font-weight-bold">شهر : {{$data->cities['city']}}</p>
                            <p class="card-text font-weight-bold">محل : {{$data->location['district']}}</p>
                            <div class="card-footer text-muted font-weight-bold">
                                امتیاز از 100 : {{$data->score}}
                            </div>
                        </div>
                    </div>
                    
            </a>

        </div>
    </div>

