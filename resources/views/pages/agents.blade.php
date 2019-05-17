<!DOCTYPE html>
<html lang="en">

@include('layouts/header')

<body>
    <?php
$page='a';
?>
@include('layouts/navbar')

<br><br>
<div class="limiter">
	<div class="container-login100">

        <form action="{{route('search.show')}}" method="POST">
            {{ csrf_field() }}
            <br>
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" name="city2" placeholder="شهر">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="location2" placeholder="محله">
                </div>
            </div>
            <br>
            <div class="form-row">
                <button class="btn btn-info" name="state" value="agent">! فیلتر کن </button>
            </div>
            <br><br>
        </form>
        <br><br><br>
        
        <?php
            $colcounter=0;
        ?>
        <div class="container">
        @if($request!=null)
            @if($request->location2!=null && $request->city2!=null)
                @foreach($profile as $key => $data)
                    <?php
                        if($colcounter>=3){
                        $colcounter=0;
                    ?>
                    </div>
                    <?php     
                        }
                    ?>
                    @if($data->isagent==1 && $data->location['district']==$request->location2 && $data->cities['city']==$request->city2)
                        <?php
                            $colcounter=$colcounter+1;
                        ?>
                        @include('layouts/agentcards') 
                    @endif
                @endforeach
            @endif
     
            @if($request->location2!=null && $request->city2==null)
                @foreach($profile as $key => $data)
                    <?php
                        if($colcounter>=3){
                        $colcounter=0;
                    ?>
                    </div>
                    <?php     
                    }
                    ?>
                    @if($data->isagent==1 && $data->location['district']==$request->location2)
                        <?php
                            $colcounter=$colcounter+1;
                        ?> 
                        @include('layouts/agentcards') 
                    @endif
                @endforeach
            @endif

            @if($request->location2==null && $request->city2!=null)
                @foreach($profile as $key => $data)
                    <?php
                        if($colcounter>=3){
                        $colcounter=0;
                    ?>
                    </div>
                    <?php     
                        }
                    ?>
                    @if($data->isagent==1 && $data->cities['city']==$request->city2)
                        <?php
                            $colcounter=$colcounter+1;
                        ?> 
                        @include('layouts/agentcards') 
                    @endif
                @endforeach
    @endif
@else
    @foreach($profile as $key => $data)
    <?php
        if($colcounter>=3){
            $colcounter=0;
            ?>
            </div>
            <br>
        <?php     
        }
      ?>
       @if($data->isagent==1)
      <?php
            $colcounter=$colcounter+1;
          ?> 
        @include('layouts/agentcards')
        @endif
        @endforeach
@endif


</div>
</div>
</div> 
</body>

@include('layouts/footer')
</html>