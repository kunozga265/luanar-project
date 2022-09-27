<div class="single-sidebar-widget" style="margin:0">

    <div class="single-item" style="margin-top:20px">
        <div class="filter">
            <h4>Filter by Keywords</h4>

            @foreach($keywords as $keyword)
                @if($loop->index<5)
                    <p><a href="{{route('keywords',['slug'=>$keyword->slug])}}">{{$keyword->name}}</a></p>
                @endif
            @endforeach

            <p  class="show-more"><a href="{{route('keywords',['slug'=>'*'])}}">SHOW MORE</a> <i class="mdi mdi-chevron-right"></i></p>
        </div>

    </div>
</div>
