<!DOCTYPE html>
<html lang="en">

@include('layouts/header')
<body class="bluediv backgroundset">
    <div class="col-md-12" style="position:fixed;margin-top:0;margin-left:0;">
        @include('layouts/map')
    </div>
    <?php
        $page='m';
    ?>
    @include('layouts/navbar')
    <?php
        $colcounter=0;
    ?>
    <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 bluediv float-right" style="height:100%;">
        @foreach($house as $key => $data)
            <?php

                if($data->RentorSell==1){
                    $rors=1;}
                else{
                    $rors=0;
                }
            ?>
            @if($data->user_id==auth()->user()->id)
                    <br>
                @include('layouts/housecards')
            @endif
        @endforeach
        {{$house->render()}}
    </div>
</body>



</html>