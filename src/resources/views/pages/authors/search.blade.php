<x-app-layout>
    <div class="event-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <x-navigation></x-navigation>
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="event-details-content">
                        <div class="single-event-item" style="padding:0">
                            <div class="single-event-image" style="border-bottom: 1px solid #e1e1e1;">
                                <form method="post" action="{{route('experts.search')}}" class="searchSection image-placeholder">
                                    @csrf
                                    <h4>Search</h4>

                                    <div class="search-field">

                                        <label for="title" class="form-group">By Name</label>
                                        <div class="field">
{{--                                            <i style="" class="fa fa-search"></i>--}}
                                            <input value="{{$name}}" type="text" id="title" name="name" class="form-control" style="" >
                                        </div>

                                    </div>

                                    <div style="text-align: center; margin-top: 10px">
                                        <input class="btn btn-primary" style="background: #03a100;"  type="submit" value="Search">
                                    </div>

                                </form>
                            </div>
                            <div class="single-event-text" style="padding:0; background-color: white">

                                <div class="listing">

                                    <ol>
                                        <a href="{{route('experts.create')}}" class="btn btn-primary" style="background: #03a100;" >Upload Expert <i class="mdi mdi-arrow-up"></i></a>
                                        <hr>
                                        @foreach($authors as $author)
                                        <li>
                                            <div class="row author-single">
                                                <div class="avatar">
                                                    <div class="image-placeholder" style="background-image: url({{asset($author->avatar)}})">
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <div class="header">
                                                        <div>{{$author->title}} {{$author->firstName}} {{$author->middleName}} <span class="font-weight-600">{{$author->lastName}}</span></div>
                                                        <p class="font-weight-600"><a href="{{route('experts.show',['id'=>$author->id])}}">View Profile</a></p>
{{--                                                        <p>{{$author->biography}}</p>--}}
                                                    </div>
                                                    <div class="details">
                                                        <div>Projects Led: {{$author->projects()->where('verified',1)->count()}}</div>
                                                        <div>Projects Collaborated: {{$author->collaborations->where('verified',1)->count()}}</div>
                                                        <div>Publications: {{$author->articles->where('verified',1)->count()}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        @endforeach

                                        @if($authors->count() == 0)
                                            <p>No experts found.</p>
                                        @endif
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
