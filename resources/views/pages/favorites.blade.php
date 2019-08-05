<!DOCTYPE html>
<html lang="en">

@include('layouts/header')

<body>
    <?php
$page='f';
?>
@include('layouts/navbar')
<?php
$colcounter=0;
?>
<br>
<div class="container">
@foreach($houses as $key => $data)
<?php
        if($colcounter>=3){
            $colcounter=0;

           echo "</div>";

        }
      ?>
      <?php
              $colcounter=$colcounter+1;
              if($data->RentorSell==1){       
                $rors=1;}
            else{
                $rors=0;}
            ?>   
    @include('layouts/housecards')

    @endforeach
    </div>
    <div class="p-5 d-flex justify-content-center">
        {{$houses->render()}}
    </div>
    </div>
    <br>

</body>

@include('layouts/footer')


</html>

