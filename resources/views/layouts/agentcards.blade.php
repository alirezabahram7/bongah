   

    @if($colcounter==1)
    <br>  
        <div class="row">
       
    @endif
    <div class="col-sm">
        <a href="{{route('profile.show',['id'=>$data->user_id])}}">    
        <div class="col">
            <div class="card card-columns pull-right" style="width: 18rem;">
                @if($data->photo!=null)
                    <?php
                    $str2=str_replace('"', '',$data->photo);
                    $str1=str_replace('[', '',$str2);
                    $str=str_replace(']', '',$str1);
                ?>
                    <img class="card-img-top" src='/pic/{{$str}}' alt="Card image cap">
                    @else
                    <img class="card-img-top" src='/pic/noimg.png' alt="Card image cap">
                    @endif
                <div class="card-body">

                <h5 class="card-title">{{$data->fname}} {{$data->lname}} :نام مشاور </h5>
                @if($data->isbongah==1)
                    <p class="card-text">ارائه دهنده: بنگاه</p>
                    @else
                    <p class="card-text">ارائه دهنده: شخصی</p>
                    @endif
                    <p class="card-text">شهر : {{$data->cities['city']}}</p>
                    <p class="card-text">محل : {{$data->location['district']}}</p>
                  
                
                <div class="card-footer text-muted">
                امتیاز از 100 : {{$data->score}}
                </div>
                </div>
                </div>
            </a>
   
  </div>
</div>

