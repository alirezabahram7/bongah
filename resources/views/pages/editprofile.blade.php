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
					ویرایش پروفایل 
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
				<form class="login100-form validate-form" action="{{route('profile.update',['id'=>$user->id])}}" method="post"  enctype="multipart/form-data">
				
				{{ csrf_field() }}

					
						<div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
							  <label for="inputZip">نام</label>
							  <input class="input100" type="text" name="fname" placeholder="نام" value="{{$user->profile['fname']}}">
								<span class="focus-input100"></span>
						</div>
					

				
					<div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
      						<label for="lname">نام خانوادگی</label>
							  <input class="input100" type="text" name="lname" placeholder="نام خانوادگی" value="{{$user->profile['lname']}}" >
						<span class="focus-input100"></span>
					</div>
				
					<div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
							  <label for="inputZip">ايميل</label>
							  <input class="input100" type="text" name="email" placeholder="ایمیل" value="{{$user->email}}" required />
								<span class="focus-input100"></span>
						</div>

                        <div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
							  <label for="inputZip">شماره تلفن</label>
							  <input class="input100" type="text" name="phonenum" placeholder="شماره تلفن" value="{{$user->profile['phonenum']}}">
								<span class="focus-input100"></span>
						</div>

					<div class="col-md-12 validate-input m-b-26 form-group row" style="margin-right:30px;"
						 data-validate="شهر را وارد کنید">
						<label for="inputZip">شهر</label>
						<select name="city" id="city" class="form-control">
							<option value="{{$user->profile['city_id']}}">{{$user->profile->cities['city']}}</option>
							@foreach($cities as $city)
								<option value="{{ $city->id }}">{{$city->city}}</option>
							@endforeach
						</select>

					</div>
						
					<div class="wrap-input100 validate-input m-b-26 form-group row" style="margin-right:30px;">
      						<label for="inputZip">محله</label>
                              @if($user->profile['location_id']!=null)
							  <input class="input100" type="text" name="location" placeholder="محله" value="{{$user->profile->location['district']}}" >
                              @else
                              <input class="input100" type="text" name="location" placeholder="محله">
                              @endif
						<span class="focus-input100"></span>
					</div>
    				
                    <div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
      						<label for="zip">کد پستی</label>
							  <input class="input100" type="text" name="zip" placeholder="کد پستی" value="{{$user->profile['zip']}}">
						<span class="focus-input100"></span>
					</div>
					
					<fieldset class="form-group">
    					<div class="row">
      						<legend class="col-form-label col-sm-2 pt-0"></legend>
      						<div class="col-sm-10">
								<div class="form-check">
                                    @if($user->profile['isagent']==1)
                                      <input class="form-check-input" type="checkbox" name="isagent" value="1" id="isagent" checked>
                                    @else
                                    <input class="form-check-input" type="checkbox" name="isagent" value="1" id="isagent">
                                    @endif
  										<label class="form-check-label" for="isagent">
    						 				آیا مشاور هستید؟
  										</label>
								</div>

								<div class="form-check">
                                    @if($user->profile['isbongah']==1)
                                      <input class="form-check-input" type="checkbox" name="isbongah" value="1" id="isbongah" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="isbongah" value="1" id="isbongah">
                                    @endif
  									<label class="form-check-label" for="isbongah">
    						 			آیا به صورت بنگاه عمل می کنید؟
  									</label>
								</div>	



							</div>
    					</div>
					  </fieldset>
					  
					 <br><br>


					<div class="wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
    					<label for="comment">توضیحات</label>
    					<textarea class="input100" id="comment" name="comment" rows="5">{{$user->profile['comment']}}</textarea>
  					</div>
					
					

					

<br/>


					<div class="custom-file wrap-input100 m-b-26 form-group row" style="margin-right:30px;">
    					
					  
					  
						<!--<input type="file" class="custom-file-input input100" id="fileInput" name="photo" style="display: none;" accept="image/*"  />
    					<input type="button" class="btn btn-info" value="آپلود عکس" onclick="document.getElementById('fileInput').click();" />
					
    <input type="text" name="some_text" id="some_text" />-->
	<div class="input-group control-group increment" >
          <input type="file" name="photo[]" class="form-control" accept="image/*" value="{{$user->profile['photo']}}">
          <div class="input-group-btn">
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
        </div>
		
        
</div>
      
<br/><br/>
					<div class="container-login100-form-btn p-5 d-flex justify-content-center" >
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
