<!DOCTYPE html>
<html lang="en">

@include('layouts/header')

<body background="mainImg/bk4.jpg" class="mainbody">
      
  @include('layouts/navbar')

  @if (session()->has('success'))
    <div class="alert alert-success text-center animated fadeIn">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
        {{ Auth::user()->name }} 
            {!! session()->get('success') !!}
        </strong>
    </div>
@endif


  <header id="header2" style="font-family:IRANSansWeb";>
    <div class="container mt-3 home-page-tabs">

      <br> <br>  <br>
      <ul class="nav mynav col-lg-5 col-md-6 col-sm-8 col-xs-11 " style="">
      <li class="nav-item mynav col-4" style="margin:auto;">
          <a class="nav-link" data-toggle="tab" href="#menu2"><h6>مشاوره</h6></a>
        </li>
        <li class="nav-item mynav col-4" style="margin:auto;">
          <a class="nav-link" data-toggle="tab" href="#menu1"><h6>اجاره</h6></a>
        </li>
        <li class="nav-item mynav col-4" style="margin:auto;">
          <a class="nav-link active " data-toggle="tab" href="#home"><h6>خرید</h6></a>
        </li>
        
      </ul>
      
    
      <form action="{{route('search.show')}}" method="post">
      {{ csrf_field() }}
      <div class="tab-content">
        <div id="home" class="container tab-pane active"><br>
        
      
          <div class="input-group col-md-6 col-sm-12" style="margin:auto;">
          
            <div class="input-group-prepend d-none d-sm-block">
              <button class="btn btn-info iransans" name="state" value="buy" style="height:50px;" >جستجوی خرید</button>
             
            </div>
        <div class="input-group-prepend d-sm-none">
              <button class="btn btn-info iransans" name="state" value="buy" style="height:50px;" ><i class="fa fa-search" style="font-size:20px;padding:10px;"></i></button>
             
            </div>
            <input type="text" name="srch" class="form-control iransans" style="height:50px;" placeholder="شهر، محله، یا کدپستی را وارد کنید">
            
            
          </div>
       
        </div>
        
        
        <div id="menu1" class="container tab-pane fade"><br>
          
              <div class="input-group col-md-6 col-sm-12" style="margin:auto;">
                <div class="input-group-prepend d-none d-sm-block">
             
                  <button class="btn btn-info iransans" name="state" value="rent" style="height:50px;">جستجوی اجاره</button>
                  
                </div>
            <div class="input-group-prepend d-sm-none">
             
                  <button class="btn btn-info iransans" name="state" value="rent" style="height:50px;"><i class="fa fa-search" style="font-size:20px;padding:10px;"></i></button>
                  
                </div>
                <input type="text" name="srch1" class="form-control iransans" style="height:50px;" placeholder="شهر، محله، یا کدپستی را وارد کنید">
                          </div>
          
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
          
              <div class="input-group col-md-6 col-sm-12" style="margin:auto;">
                <div class="input-group-prepend d-sm-none">
                
                  <button class="btn btn-info iransans" name="state" value="agent" style="height:50px;">جستجوی مشاور</button>
                
                </div>
            <div class="input-group-prepend d-none d-sm-block">
                
                  <button class="btn btn-info iransans" name="state" value="agent" style="height:50px;"><i class="fa fa-search" style="font-size:20px;padding:10px;"></i></button>
                
                </div>
            <input type="text" name="srch2" class="form-control iransans" style="height:50px;" placeholder="شهر، محله، یا کدپستی را وارد کنید">
            
              </div>

        </div>
        </form>
      </div>
    </div>
  </header>
 
@include('layouts/prefooter')
<!-- Add icon library -->

</body>

@include('layouts/footer')
</html>
<style>
.col-centered{
    float: none;
    margin: 0 auto;
}
ul.mynav{

  margin:auto;background-color:rgba(0,0,0,0.6);
}
 li.mynav{
  float: left;
  border-left: 1px solid #bbb;
 }
 li.mynav a{
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
 }
 li.mynav a:hover:not(.active) {
  background-color: #000000;
  opacity:1;
  z-index:1;
}
 li.mynav a.active{
   background-color:#3FBFBF;
   opacity:0.9;
 }
 li.mainnav a{
  font-family: 'IranianSansRegular'; 
    font-weight: bold; 
  color: black;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}
li.mainnav a.active{
 background-color: #3FBFBF; 
  color: black;
}
li.mainnav a:hover{

  color: #3FBFBF;}
  li.mainnav a:active{
    background-color: #3FBFBF; 
    color: black;}

  .iransans{
    font-family: 'IranianSansRegular'; 
    font-weight: normal; 
    font-style: normal; 
  }
</style>
  
  