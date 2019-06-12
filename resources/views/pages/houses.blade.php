<!DOCTYPE html>
<html lang="en">

@include('layouts/header')

<body class="bluediv backgroundset">
    <div class="col-md-12" style="position:fixed;margin-top:0;margin-left:0;">
    @include('layouts/map')

</div>
        <?php
        $page = $rors;
        ?>
        @include('layouts/navbar')

        <?php
        $colcounter = 0;
        ?>
        <div class="col-lg-3 col-md-5 col-sm-12 col-xs-12 bluediv float-right" style="height:100%;">
            <a class="btn-floating btn-fb" style="position:fixed;z-index:10;cursor: pointer;">
                <img src="/mainImg/icons/filter-flat.png" class="popup-button" onclick="openForm()" style="width:48px;height:48px;" alt="" srcset="">
            </a>
            @include('layouts/filters')
            @if($request!=null)
                <?php
                if ($request->srch != null) {
                    $srch = $request->srch;
                } elseif ($request->srch1 != null) {
                    $srch = $request->srch1;
                } else {
                    $srch = null;
                }
                if ($srch != null) {
                    $srchArr = explode("  ", $srch);
                }
                if ($request->location != null) {
                    $loc = $request->location;
                } else {
                    $loc = $request->location1;
                }

                if ($request->city != null) {
                    $cit = $request->city;
                } else {
                    $cit = $request->city1;
                }

                if ($request->mincost != null) {
                    $minc = $request->mincost;
                } else {
                    $minc = 0;
                }
                if ($request->maxcost != null) {
                    $maxc = $request->maxcost;
                } else {
                    $maxc = 999999999999;
                }

                if ($request->minrent != null) {
                    $minr = $request->minrent;
                } else {
                    $minr = 0;
                }
                if ($request->maxrent != null) {
                    $maxr = $request->maxrent;
                } else {
                    $maxr = 999999999999;
                }

                if ($request->minmet != null) {
                    $minm = $request->minmet;
                } else {
                    $minm = 0;
                }
                if ($request->maxmet != null) {
                    $maxm = $request->maxmet;
                } else {
                    $maxm = 999999;
                }


                if ($request->type != 'نوع') {
                    $type = $request->type;
                } else {
                    $type = null;
                }


                if ($request->zipcode != null) {
                    $zip = $request->zipcode;
                } else {
                    $zip = null;
                }
                ?>
                @if($srch !=null)
                    @foreach($house as $key => $data)

                        <?php
                        if($colcounter >= 1){
                        $colcounter = 0;
                        ?>
        </div>
                        <?php
                        }
                        ?>
@if(!array_key_exists(1, $srchArr) && !array_key_exists(2, $srchArr))
@if($data->RentorSell==$rors && $data->location['district']==$srchArr[0] || $data->cities['city']==$srchArr[0] || substr($data->zipcode, 0, 4 )==$srchArr[0])

<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endif
@elseif(!array_key_exists(2, $srchArr))
@if($data->RentorSell==$rors && $data->cities['city']==$srchArr[0] && $data->location['district']==$srchArr[1])

<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endif
@else
@if($data->RentorSell==$rors && $data->location['district']==$srchArr[1] && substr($data->zipcode, 0, 4 )==$srchArr[2] && $data->cities['city']==$srchArr[0])

<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endif
@endif
@endforeach
@elseif($srch==null)
@if($type==null && $zip==null)
@if($loc!=null && $cit!=null)
@foreach($house as $key => $data)

<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->location['district']==$loc && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)

<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endif
@endforeach

@elseif($loc!=null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->location['district']==$loc && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit!=null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@endif
@endif


@if($type!=null && $zip==null)
@if($loc!=null && $cit!=null)
@foreach($house as $key => $data)

<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && $data->location['district']==$loc && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)

<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endif
@endforeach

@elseif($loc!=null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && $data->location['district']==$loc && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit!=null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@endif
@endif

@if($type==null && $zip!=null)
@if($loc!=null && $cit!=null)
@foreach($house as $key => $data)

<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && substr($data->zipcode, 0, 4 )==$zip && $data->location['district']==$loc && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)

<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endif
@endforeach

@elseif($loc!=null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && substr($data->zipcode, 0, 4 )==$zip && $data->location['district']==$loc && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit!=null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && substr($data->zipcode, 0, 4 )==$zip && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && substr($data->zipcode, 0, 4 )==$zip && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@endif
@endif

@if($type!=null && $zip!=null)
@if($loc!=null && $cit!=null)
@foreach($house as $key => $data)

<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && substr($data->zipcode, 0, 4 )==$zip && $data->location['district']==$loc && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)

<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')

@endif
@endforeach

@elseif($loc!=null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && substr($data->zipcode, 0, 4 )==$zip && $data->location['district']==$loc && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit!=null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && substr($data->zipcode, 0, 4 )==$zip && $data->cities['city']==$cit && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@elseif($loc==null && $cit==null)
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>
@if($data->RentorSell==$rors && $data->type==$type && substr($data->zipcode, 0, 4 )==$zip && $data->cost > $minc && $data->cost < $maxc && $data->rent > $minr && $data->rent < $maxr && $data->meterage > $minm && $data->meterage < $maxm)
<?php
$colcounter = $colcounter + 1;
?>
@include('layouts/housecards')
@endif
@endforeach

@endif
@endif
@endif
@else
@foreach($house as $key => $data)
<?php
if($colcounter >= 1){
$colcounter = 0;
?>
</div>
<?php
}
?>

@if($data->RentorSell==$rors)
    <?php
    $colcounter = $colcounter + 1;
    ?>
    @include('layouts/housecards')
@endif
@endforeach
@endif
<div class="col-lg-3 col-md-5" style="padding-top: 20px">
    {{ $house->render() }}
</div>
</div>


</body>


</html>