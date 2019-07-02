<!DOCTYPE html>
<html lang="en">

@include('layouts/header')
<?php
$page = $rors;
?>
<body class="bluediv backgroundset">
<div class="col-md-12" style="position:fixed;margin-top:0;margin-left:0;">
    @include('layouts/map')
</div>
@include('layouts/navbar')

<?php
$colcounter = 0;
?>

<div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 bluediv float-right" style="height:100%;">
    <a class="btn-floating btn-fb" style="position:fixed;z-index:10;cursor: pointer;">
        <img src="/mainImg/icons/filter-flat.png" class="popup-button" onclick="openForm()"
             style="width:48px;height:48px;" alt="" srcset="">
    </a>
    @include('layouts/filters')

    @foreach($house as $key => $data)
        <?php
        if($colcounter >= 1){
        $colcounter = 0;
        ?>
</div>
<?php
}
?>
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endforeach

<div class="col-lg-3 col-md-5" style="padding-top: 20px">
    {{ $house->render() }}
</div>
</div>


</body>


</html>