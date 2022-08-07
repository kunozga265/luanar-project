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
{{--<div class="single-sidebar-widget" style="margin:0">

    <div class="single-item" style="margin-top:20px">
        <div class="filter">
            <h4>Filter by Programs</h4>
            <p><a href="#">Crops</a></p>
            <p><a href="#">Livestock</a></p>
            <p><a href="#">Nutrition and Food Science</a></p>
            <p  class="show-more"><a href="#">SHOW MORE</a> <i class="mdi mdi-chevron-right"></i></p>
        </div>

    </div>
</div>
<div class="single-sidebar-widget" style="margin:0">

    <div class="single-item" style="margin-top:20px">
        <div class="filter">
            <h4>Filter by Topics</h4>
            <p><a href="#">Food Security</a></p>
            <p><a href="#">Livestock</a></p>
            <p><a href="#">Animal Health</a></p>
            <p><a href="#">Value Chain Analysis</a></p>
            <p><a href="#">Food Policy Analysis</a></p>
            <p><a href="#">Plant Breeding</a></p>
            <p><a href="#">Irrigation</a></p>
            <p><a href="#">Biotechnology</a></p>
            <p><a href="#">Economic Development</a></p>
            <p><a href="#">Government Subsidy</a></p>
            <p><a href="#">Agricultural Engineering</a></p>
            <p><a href="#">Nutrition and Diet</a></p>
            <p  class="show-more"><a href="#">SHOW MORE</a> <i class="mdi mdi-chevron-right"></i></p>
        </div>

    </div>
</div>--}}
