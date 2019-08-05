<!DOCTYPE html>
<html lang="en">

@include('layouts/header')
<body>
<?php
$page='h';
?>
@include('layouts/navbar')
<?php
    $myid=0;
  
    use MPCO\EnglishPersianNumber\Numbers;
    $cost=Verta::persianNumbers($house->cost);
    $rent=Verta::persianNumbers($house->rent);
    $meterage=Verta::persianNumbers($house->meterage);
    $rooms=Verta::persianNumbers($house->rooms);
    $floor=Verta::persianNumbers($house->floor);
    $build_year=Verta::persianNumbers($house->build_year);
    $zipcode=Verta::persianNumbers($house->zipcode);

?>

<div class="container-login100">
    <div class="container" style="direction:rtl;">
        <div class="row" >
            <br><br>
            <?php
            $photo="";
            ?>
            @if($house->photo!=null)
                <?php
                $photo=$house->photo;
                ?>   
            @else
                <?php
                $photo='noimg.png';
                ?>   
            @endif
            <div class="card card-columns pull-right" style="width: 46rem;">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <?php
                            $str2=str_replace('"', '',$photo);
                            $str1=str_replace('[', '',$str2);
                            $str=str_replace(']', '',$str1);
                            $myArray = explode(',',$str );
                            
                            for($i=1;$i<count($myArray);$i++){
                        ?>
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
                        <?php
                        }
                        ?>

                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php
                                
                                    $f="/pic/".$myArray[0];
                                    
                                ?>
                            <img class="d-block w-100" src="{{$f}}" alt="slide"."{{$i}}">
                        </div>
                        <?php
                            for($i=1;$i<count($myArray);$i++){
                                $f="/pic/".$myArray[$i];
                        ?>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{$f}}" alt="slide"."{{$i}}">
                        </div>
                        <?php
                        }
                        ?>    
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="card-body">
                        <span>{{$house->comment}}</span>
                </div>
            </div>
            <div class="col-sm-4">   
                <ul class="list-group">
                    <li class="list-group-item text-muted">
                        @if(Auth::check())     
                            <?php
                                $myid=auth()->user()->id;  
                            ?>
                            @if(!$house->favouritedBy(Auth::user()))
                                <span class="pull-left"><a href="{{route('fav.save',['hid'=>$house->id])}}" data-toggle="tooltip"><i onclick="tglbkmrk(this)" class="fa fa-bookmark-o"></i></a></span>
                            @else
                                <span class="pull-left"><a href="{{route('fav.destroy',['hid'=>$house])}}" data-toggle="tooltip"><i onclick="tglbkmrk(this)" class="fa fa-bookmark"></i></a></span>
                            @endif
                        @endif
                        @if($house->RentorSell==1)
                            <strong>خانه برای فروش</strong>
                    </li>
                            <li class="list-group-item text-right"><span class="pull-left">{{$cost}}</span><strong>قیمت</strong></li>
                        @else
                            <strong>خانه برای اجاره</strong></li>
                            <li class="list-group-item text-right"><span class="pull-left">{{$cost}}</span><strong>رهن</strong></li>
                            <li class="list-group-item text-right"><span class="pull-left">{{$rent}}</span><strong>اجاره</strong></li>
                        @endif
                        <li class="list-group-item text-right"><span class="pull-left">{{$house->location['district']}}</span><strong>{{$house->cities['city']}}</strong></li>
                        <li class="list-group-item text-right"><span class="pull-left">  {{$rooms}} :تعداد اتاق  </span><strong>{{$house->type}}-{{$meterage}}متری</strong></li>
                            
                        @if($house->floor==0)
                            <li class="list-group-item text-right"><span class="pull-left">همکف</span><strong>طبقه</strong></li>
                        @elseif($house->floor==-1)
                            <li class="list-group-item text-right"><span class="pull-left">زیر همکف</span><strong>طبقه</strong></li>
                        @else
                            <li class="list-group-item text-right"><span class="pull-left">  {{$floor}} </span><strong>طبقه</strong></li>
                        @endif

                        <li class="list-group-item text-right"><span class="pull-left">{{$build_year}}</span><strong>  سال ساخت</strong></li>
                        <li class="list-group-item text-right text-center bg-secondary text-light"><strong>   نشانی </strong><br>{{$house->address}}
                        <li class="list-group-item text-right"><span class="pull-left">  {{$zipcode}} </span><strong>کد پستی</strong></li>
                        <li class="list-group-item text-right">
                        @if($house->parking==1)
                            <strong>   پارکینگ : دارد</strong>
                        @else
                            <strong>   پارکینگ : ندارد</strong>
                        @endif
                        <br>
                        @if($house->anbari==1)
                            <strong>   انباری : دارد</strong>
                        @else
                            <strong>   انباری : ندارد</strong>
                        @endif
                        <br>
                        @if($house->elevator==1)
                            <strong>   آسانسور : دارد</strong>
                        @else
                            <strong>   آسانسور : ندارد</strong>
                        @endif
                        <br>
                        @if($house->balcony==1)
                            <strong>   بالکن : دارد</strong>
                        @else
                            <strong>   بالکن : ندارد</strong>
                        @endif
                
                        </li>
                        <li class="card-footer text-light text-center bg-secondary" dir="rtl">
                            <?php
                                $v1= Verta::now();
                                $dt =$house->created_at;
                                $v2=new Verta($dt);
                                $v3=$v2->formatDifference($v1);
                                echo Verta::persianNumbers($v3);
                            ?>
                        </li>
                </ul> 
            </div>
        </div>  
        <div class="row">
            <div class="col">
                </br></br>
                <ul class="list-group text-right">
                    @if($house->user['id']==$myid)
                        <span class="pull-right">
                            <a href="{{route('house.edit',['id'=>$house->id])}}">
                                <i class="fa fa-edit"></i>
                                <strong>ویرایش</strong>
                            </a>
                        </span>
                    @else
                            <li class="list-group-item col-sm-6 bg-secondary text-light">
                                <?php
                                $str2=str_replace('"', '',$house->user->profile['photo']);
                                $str1=str_replace('[', '',$str2);
                                $photo=str_replace(']', '',$str1);
                                if($photo==null){
                                    $photo='nopro.png';
                                }
                                ?>
                                <a href="{{route('profile.show',['id'=>$house->user['id']])}}">
                                            <img title="profile image" class="img-thumbnail rounded-circle img-responsive" style="width:10%" src="/pic/{{$photo}}">
                                        <span class="font-weight-bold text-light text-left">
                                           مشاورشما
                                            {{$house->user['name']}}&nbsp;
                                        </span>

                                </a>
                            </li>
                    @endif
                    <a href="#"><li class="list-group-item"><i class="fa fa-at"></i><strong>{{$house->user['email']}}</strong></li></a>
                    <a href="#"><li class="list-group-item"><i class="fa fa-phone-square"></i><strong>{{$house->user->profile['phonenum']}}</strong></li></a>
                    @if($house->user['id']==$myid)
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i>
                            حذف خانه 
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">تایید حذف</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        آیا از حذف خانه مطمئن هستید ؟
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">خير</button>
                                        <a href="{{route('house.delete',['id'=>$house->id])}}"><button type="button" class="btn btn-danger">بله</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </ul>      
                </br></br>
            </div><!--/col-3-->
        </div>
    </div>
</div>

</body>

<script>
/* pagination */
$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage: 7,
            showPrevNext: false,
            numbersPerPage: 1,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = settings.perPage; 
    var children = listElement.children();
    var pager = $('.pagination');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
  
    if (settings.numbersPerPage>1) {
       $('.page_link').hide();
       $('.page_link').slice(pager.data("curr"), settings.numbersPerPage).show();
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
  	pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
       
        if (settings.numbersPerPage>1) {
       		$('.page_link').hide();
       		$('.page_link').slice(page, settings.numbersPerPage+page).show();
    	}
      
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");  
    }
};

$('#items').pageMe({pagerSelector:'#myPager',childSelector:'tr',showPrevNext:true,hidePageNumbers:false,perPage:5});
/****/
</script>

@include('layouts/footer')
</html>