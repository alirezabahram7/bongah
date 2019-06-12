
<div class="form-popup col-lg-3 col-md-5 col-sm-12 col-xs-12 float-right" id="popup_form" style="margin-top:0;background-color:rgb(26, 26, 26);">
<form action="{{route('search.show')}}" method="POST" clas="popup-container">
{{ csrf_field() }}
<br><br>
<div class="form-row">
          <p class="iransans" style="color:white;margin:auto;">جستجوی پیشرفته</p>
</div>
<br>
<br>
  <div class="form-row">
   
    <div class="col">
      <input type="text" class="form-control" name="mincost" placeholder="حداقل قیمت">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="maxcost" placeholder="حداکثر قیمت">
    </div>
  </div>
  <br>
  @if($rors==0)
 
  <div class="form-row">
  
    <div class="col">
      <input type="text" class="form-control" name="minrent" placeholder="حداقل اجاره">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="maxrent" placeholder="حداکثر اجاره">
    </div>
  </div>
  <br>
  @endif

  <div class="form-row">
  <div class="col">
      					<select id="type" name="type" class="form-control">
        					<option selected> نوع</option>
        						<option>آپارتمان</option>
								<option>ویلایی</option>
								<option>کلنگی</option>
								<option>زمین</option>
								<option>مستغلات</option>
      					</select>
					</div>
    <div class="col">
      <input type="text" class="form-control" name="minmet" placeholder="حداقل متراژ">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="maxmet" placeholder="حداکثر متراژ">
    </div>
  </div>
  <br>
  <div class="form-row">
    <div class="col">
      <?php
            $cities=\App\city::all();
      ?>
      <select name="city" id="city" class="form-control">
        <option>انتخاب کنید</option>
        @foreach($cities as $city)
          <option value="{{ $city->id }}">{{$city->city}}</option>
        @endforeach
      </select>
    </div>
    <div class="col">
      <input type="text" class="form-control" name="location" placeholder="محله">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="zipcode" placeholder="رقم پستی">
    </div>
  </div>
  <br>
  <div class="form-row">
    @if($rors==1)
    <button class="btn btn-info center" name="state" value="buy">! فیلتر کن </button>
    @else
    <button class="btn btn-info center" name="state" value="rent">! فیلتر کن </button>
    @endif
 
  

</div>
</form>
<br>   <br>
</div>