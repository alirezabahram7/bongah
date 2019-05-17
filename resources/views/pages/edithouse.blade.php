<!DOCTYPE html>
<html lang="en">

@include('layouts/header')
<body>
    <?php
$page='m';
?>
@include('layouts/navbar')

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title">
					<span class="login100-form-title-1" style="font-family:IRANSansWeb">
					ویرایش خانه 
					</span>
				</div>
				@if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
        @endif
				<form class="login100-form validate-form" action="{{route('house.update',['id'=>$house->id])}}" method="post"  enctype="multipart/form-data">
				
				{{ csrf_field() }}
					
						<div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="تعداد اتاق را وارد کنید">
							  <label for="inputZip">تعداد اتاق</label>
							  <input class="input100" type="text" name="rooms" placeholder="تعداد اتاق" value="{{$house->rooms}}">
								<span class="focus-input100"></span>
						</div>
					

				
					<div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate=" طبقه را وارد کنید ">
      						<label for="inputZip">طبقه</label>
							  <input class="input100" type="text" name="floor" placeholder="طبقه" value="{{$house->floor}}" >
						<span class="focus-input100"></span>
					</div>
				
					

					<div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="شهر را وارد کنید">
      						<label for="inputZip">شهر</label>
							  <input class="input100" type="text" name="city" placeholder="شهر" value="{{$house->cities['city']}}">
						<span class="focus-input100"></span>
					</div>
						
					<div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="محله را وارد کنید">
      						<label for="inputZip">محله</label>
							  <input class="input100" type="text" name="location" placeholder="محله" value="{{$house->location['district']}}" >
						<span class="focus-input100"></span>
					</div>
    				
					<div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="نشانی را وارد کنید">
    						<label for="address">نشانی</label>
    						<textarea class="input100" name="address"  id="address" rows="3" >{{$house->address}}</textarea>
  					</div>
					
						<div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
      						<label for="inputZip">کدپستی</label>
							  <input class="input100" type="text" name="zip" placeholder="کدپستی" value="{{$house->zipcode}}" >
						<span class="focus-input100"></span>
					</div>

					<fieldset class="form-group">
    					<div class="row">
      						<legend class="col-form-label col-sm-2 pt-0"></legend>
      						<div class="col-sm-10">
								<div class="form-check">
                                    @if($house->parking==1)
                                      <input class="form-check-input" type="checkbox" name="parking" value="1" id="parking" checked>
                                    @else
                                    <input class="form-check-input" type="checkbox" name="parking" value="1" id="parking">
                                    @endif
  										<label class="form-check-label" for="parking">
    						 				پارکینگ
  										</label>
								</div>

								<div class="form-check">
                                    @if($house->anbari==1)
                                      <input class="form-check-input" type="checkbox" name="anbari" value="1" id="anbari" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="anbari" value="1" id="anbari">
                                    @endif
  									<label class="form-check-label" for="anbari">
    						 			انباری
  									</label>
								</div>
					
								<div class="form-check">
                                    @if($house->elevator==1)
                                        <input class="form-check-input" type="checkbox" name="elevator" value="1" id="elevator" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="elevator" value="1" id="elevator">
                                    @endif
  									<label class="form-check-label" for="elevator">
    						 			آسانسور
  									</label>
								</div>	


								<div class="form-check">
                                    @if($house->balcony==1)
                                      <input class="form-check-input" type="checkbox" name="balcony" value="1" id="balcony" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="balcony" value="1" id="balcony">
                                    @endif
  									<label class="form-check-label" for="balcony">
    						 			بالکن
  									</label>
								</div>
							<br><br>
					
								<div class="form-check">
                                    @if($house->RentorSell==1)
                                      <input class="form-check-input" type="radio" name="sell" id="sale" value="1" checked>
                                    @else
                                        <input class="form-check-input" type="radio" name="sell" id="sale" value="1">
                                    @endif
  									<label class="form-check-label" for="sale">			
    									برای فروش
									</label>
								</div>	

								<div class="form-check">
                                    @if($house->RentorSell==0)
                                      <input class="form-check-input" type="radio" name="sell" id="rent" value="0" checked>
                                    @else
                                        <input class="form-check-input" type="radio" name="sell" id="rent" value="0">
                                    @endif
  									<label class="form-check-label" for="rent">			
    									برای اجاره
									</label>
								</div>
							</div>
    					</div>
					  </fieldset>
					  
					 <br><br>
					  <div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="قیمت را وارد کنید">
      						<label for="inputZip">قیمت فروش یا رهن</label>
							  <input class="input100" type="text" name="cost" placeholder="قیمت فروش یا رهن" value="{{$house->cost}}" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
      						<label for="inputZip">اجاره</label>
							  <input class="input100" type="text" name="rentcost" placeholder="اجاره" value="{{$house->rent}}" >
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="متراژ را وارد کنید">
      						<label for="meterage">متراژ</label>
							  <input class="input100" type="text" name="meterage" placeholder="متراژ" value="{{$house->meterage}}" >
						<span class="focus-input100"></span>
					</div>



					<div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
    					<label for="comment">توضیحات</label>
    					<textarea class="input100" id="comment" name="comment" rows="5">{{$house->comment}}</textarea>
  					</div>
					
					
					  <div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="سال ساخت را وارد کنید">
      					<label for="year">سال ساخت</label>
      					<select id="year" name="year" class="form-control">
        					<option selected>{{$house->build_year}}</option>
							<?php
							$v = Verta::today(); 
							?>
							@for($i=$v->year;$i>=1301;$i--)
        						<option>{{$i}}</option>
							@endfor
      					</select>
					</div>

					  <div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;" data-validate="نوع را وارد کنید">
      					<label for="type">نوع</label>
      					<select id="type" name="type" class="form-control">
        					<option selected>{{$house->type}}</option>
        						<option>آپارتمان</option>
								<option>ویلایی</option>
								<option>کلنگی</option>
								<option>زمین</option>
								<option>مستغلات</option>
      					</select>
					</div>
					

<br/>


					<div class="custom-file wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
    					
					  
					  
						<!--<input type="file" class="custom-file-input input100" id="fileInput" name="photo" style="display: none;" accept="image/*"  />
    					<input type="button" class="btn btn-info" value="آپلود عکس" onclick="document.getElementById('fileInput').click();" />
					
    <input type="text" name="some_text" id="some_text" />-->
	<div class="input-group control-group increment" >
          <input type="file" name="photo[]" class="form-control" accept="image/*" value="{{$house->photo}}">
          <div class="input-group-btn">
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
		<div class="clone hide">
          <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="photo[]" class="form-control">
            <div class="input-group-btn"> 
              <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
          </div>
        </div>
        
</div>
      
<br/><br/>
					<div class="container-login100-form-btn" style="margin-left:70px;">
						<button type="submit" class="login100-form-btn" style="font-family:IRANSansWeb">
							 ثبت تغییرات
						</button>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	
<!--===============================================================================================-->
	<script src="/js/jquery-3.2.1.min.js"></script>
	<script src="/js/login-bootstrap.min.js"></script>
	<script src="js/login-main.js"></script>
	
</body>
@include('layouts/footer')
</html>
