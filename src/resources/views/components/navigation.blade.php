
<div class="single-sidebar-widget" style="margin:0">
    <h4 class="title">About Research at Luanar.</h4>
    {{-- <div class="recent-content" style="border: solid 1px aqua">
         <ul>
             <li
                 style="padding: 7px; border-bottom: solid 1px aqua"
                 >

                 <a href="{{route('home')}}">
                     <b> <i class="mdi mdi-chevron-right"></i> About Research</b>
                 </a>

             </li>

             <li style="padding: 7px; border-bottom: solid 1px aqua; background:#2621ff;" ><a href="{{route('publications')}}"><b style="color: #FFFAFA"> <i class="mdi mdi-chevron-right"></i> Publications</b></a></li>
             <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="{{route('datasets')}}"><b> <i class="mdi mdi-chevron-right"></i> Datasets</b></a></li>
             <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Patents</b></a></li>
             <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Staff</b></a></li>
             <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Researchers</b></a></li>
             <li style="padding: 7px; border-bottom: solid 1px aqua"><a href="#"><b> <i class="mdi mdi-chevron-right"></i> Agriculture Directorate</b></a></li>

         </ul>

     </div>--}}
    <div class="recent-content-section">
        <div class="recent-content-section">
            <p><a href="{{route('publications')}}" class="{{Request::is('publications')?'active':''}}">Publications</a></p>
            <p><a href="{{route('datasets')}}"  class="{{Request::is('datasets')?'active':''}}">Datasets</a></p>
{{--            <p><a href="{{route('upload')}}"  class="{{Request::is('upload')?'active':''}}">Upload</a></p>--}}
            <p><a href="{{route('projects')}}"  class="{{Request::is('projects')?'active':''}}">Projects & Outreach Programs</a></p>
            <p><a href="#"></a></p>
            <p><a href="#">Researchers</a></p>
            <p><a href="#">Agriculture Directorate</a></p>
        </div>
    </div>
</div>
