<!DOCTYPE html>
<html lang="en">

@include('layouts/header')

<body>
    <?php
$page='m';
?>
@include('layouts/navbar')

@if(Auth::check())
<?php
$colcounter=0;
?>
<br>
<div class="container">
@foreach($house as $key => $data)
<?php
        if($colcounter>=3){
            $colcounter=0;
            ?>
            </div>
        <?php     
        }
      ?>
      <?php
              $colcounter=$colcounter+1;
              if($data->RentorSell==1){       
                $rors=1;}
            else{
                $rors=0;}
            ?>
            @if($data->user_id==auth()->user()->id)
    @include('layouts/housecards')
@endif
    @endforeach
    </div>
    </div>
    <br>
@endif
</body>

@include('layouts/footer')


</html>

