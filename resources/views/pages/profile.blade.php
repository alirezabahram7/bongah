<!DOCTYPE html>
<html lang="en">
<?php
use App\house;
?>
@include('layouts/header')
<body>
<?php

$myid=0;
$page='h';
if(Auth::check()){
  $myid=auth()->user()->id;  

if($user->id==$myid){
$page='m';}}

?>
@include('layouts/navbar')
<hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-10"><h1>{{$user->name}}</h1></div>
            <div class="col-sm-2">
            <a  class="pull-right">
            @if($user->profile['photo']!=null)
                <?php
                $avatar=str_replace('"', '',$user->profile['photo']);
                $avatar2="/pic/".$avatar;
                ?>
            <img title="profile image" class="img-thumbnail rounded-circle img-responsive" src="{{$avatar2}}">
            @else
            <img title="profile image" class="img-thumbnail img-responsive" src="/pic/nopro.png">
            @endif
         
            </a>
            </div>
 
    <div class="col-lg-5">
      <div class="star-rating">
        <span class="fa fa-star-o" data-rating="1"></span>
        <span class="fa fa-star-o" data-rating="2"></span>
        <span class="fa fa-star-o" data-rating="3"></span>
        <span class="fa fa-star-o" data-rating="4"></span>
        <span class="fa fa-star-o" data-rating="5"></span>
        <?php
        $score=($user->profile['score'])/20;
        
        ?>
        <input type="hidden" name="whatever1" class="rating-value" value={{$score}}>
      </div>
    </div>



<style>
.star-rating {
  line-height:32px;
  font-size:1.25em;
}

.star-rating .fa-star{color: yellow;}
</style>
<script>
var $star_rating = $('.star-rating .fa');

var SetRatingStar = function() {
  return $star_rating.each(function() {
    if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
      return $(this).removeClass('fa-star-o').addClass('fa-star');
    } else {
      return $(this).removeClass('fa-star').addClass('fa-star-o');
    }
  });
};

$star_rating.on('click', function() {
  $star_rating.siblings('input.rating-value').val($(this).data('rating'));
  return SetRatingStar();
});

SetRatingStar();
$(document).ready(function() {

});
</script>

           
        </div></br>
        
        <div class="row">
            <div class="col-sm-3"><!--left col-->
                
            <ul class="list-group">
                <li class="list-group-item text-muted">نمایه کاربر</li>
                <li class="list-group-item text-right"><span class="pull-left">{{$user->created_at}}</span><strong>عضویت</strong></li>
                <li class="list-group-item text-right"><span class="pull-left">{{$user->profile['fname']}} {{$user->profile['lname']}}</span><strong>نام</strong></li>
                @if($user->profile['isagent']==1)
                    <li class="list-group-item text-right"><span class="pull-left">مشاور</span><strong>کاربر</strong></li>
                    @else
                    <li class="list-group-item text-right"><span class="pull-left">عادی</span><strong>کاربر</strong></li>
                    @endif
                @if($user->profile['isbongah']==1)
                <li class="list-group-item text-right"><span class="pull-left">بنگاه</span><strong>نوع همکاری</strong></li>
                    @else
                    <li class="list-group-item text-right"><span class="pull-left">فرد حقیقی</span><strong>نوع همکاری</strong></li>
                    @endif

            </ul> 
                
            
            
            </br></br>
            <ul class="list-group">
                <li class="list-group-item text-muted"><i class="fa fa-address-card fa-1x"></i></li>
                <li class="list-group-item"><i class="fa fa-at"></i><strong>{{$user->email}}</strong></li>
                <li class="list-group-item"><i class="fa fa-phone-square"></i><strong>{{$user->profile['phonenum']}}</strong></li>

            </ul> 

                
          </br></br>
            
            </div><!--/col-3-->
            <?php
                $myid=0;
            ?>
            @if(Auth::check())
            <?php
              $myid=auth()->user()->id;  
            ?>
            @endif
            @if($user->id==$myid)
            <div class="col-sm-9">
            
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="{{route('profile.edit',['id'=>$myid])}}"><span class="pull-left"><i class="fa fa-edit"></span></i></a></li>
                
                <li class="active"><a href="/inserthouses"><span class="pull-left"><i class="fa fa-plus-square"></span></i></a></li>
            </ul>
            
            
            
                <hr>
                
                <h2>دسترسی های من</h2>
                
                <div class="table-responsive">
                    <table class="table table-hover">
                    
                    <tbody>
                        <tr>
                        <td>
                        <a href="{{route('profile.edit',['id'=>$myid])}}"><i class="pull-right fa fa-edit"></i></br><h5>ویرایش مشخصات نمایه</h5>
                        </a></td>
                        </tr>
                        <tr>
                        <td><a href="/inserthouses">
                        <i class="pull-right fa fa-plus-square"></i></br><h5>افزودن خانه برای فروش یااجاره</h5>
                        </a></td>
                        </tr>
                        <tr>
                        <td><a href="{{route('myhouses.show')}}">
                        <i class="pull-right fa fa-home"></i></br><h5>مدیریت خانه های من</h5>
                        </a></td>
                        </tr>
                        <tr>
                        <td><a href="{{route('houses.fav')}}">
                        <i class="pull-right fa fa-bookmark"></i></br><h5>خانه های دلخواه من</h5>
                        </a></td>
                        </tr>
                    
                    </tbody>
                    
                    </table>
                    
                </div>
                 <!-- Button trigger modal -->
                 <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash"></i>
  حذف پروفایل 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width:100%">
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
        <a href="{{route('profile.delete',['id'=>$myid])}}"><button type="button" class="btn btn-danger">بله</button></a>
      </div>
    </div>
  </div>
</div>
                </div><!--/tab-pane-->
                
                
                </div><!--/tab-pane-->
                
            </div><!--/tab-content-->

            </div><!--/col-9-->
        
        @else
            <?php
                
                $house=house::all();
                $colcounter=0;
            ?>
            <div class="pull-right col-sm-9" style="width:100%">
            @foreach($house as $key => $data)
            <?php
        if($colcounter>=2){
            $colcounter=0;
            ?>
            </div>
        <?php     
        }
      ?>
      
      @if($data->user_id==$user->id)
        <?php
          $colcounter=$colcounter+1;
        
        if($data->RentorSell==1){       
            $rors=1;}
        else{
            $rors=0;}
        ?>
        @include('layouts/housecards')    
      @endif
    @endforeach 
           </div> 
        @endif

        </div><!--/row-->
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