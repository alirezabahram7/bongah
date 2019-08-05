<!DOCTYPE html>
<html lang="en">

@include('layouts/header')

<body>
<?php
$page = 'a';
?>
@include('layouts/navbar')

<br><br>
<div class="limiter">
    <div class="container-login100 d-flex flex-column">
        <div class="justify-content-center">
        <form action="{{route('search.show')}}" method="POST">
            {{ csrf_field() }}

            <div class="form-row">
                <div class="col-s-12">
                    <input type="text" class="form-control" name="srch2" placeholder="شهر، محله یا نام مشاور را وارد کنید (دو فاصله بین هر کلمه)">
                </div>

            <br>
                <button class="btn btn-info" name="state" value="agent">جستجو  </button>
            </div>
            <br><br>
        </form>
        </div>
        <?php
        $colcounter = 0;
        ?>
        <div class="container">
                    @foreach($profile as $key => $data)
                        <?php
                        if($colcounter >= 3){
                        $colcounter = 0;
                        echo "</div>";
                            }
                            ?>

                        <?php
                        $colcounter = $colcounter + 1;
                        ?>
                        @include('layouts/agentcards')

                    @endforeach

        </div>
        <div class="container p-3 d-flex justify-content-center">
            {{$profile->render()}}
        </div>
    </div>
</div>
</body>

@include('layouts/footer')
</html>