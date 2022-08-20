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
                                            <input type="text" id="title" name="name" class="form-control" style="" >
                                        </div>

                                    </div>

                                  {{--  <div class="search-filters">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="authors" class="form-group">By Principle Investigator</label>
                                                <select id="authors" name="author" class="form-control">
                                                    <option value="">Select Author</option>
                                                    @foreach($authors as $author)
                                                        <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="donor" class="form-group">By Donor</label>
                                                <select name="donor" id="donor" class="form-control">
                                                    <option value="">Select Donor</option>
                                                    @foreach($donors as $donor)
                                                        <option value="{{$donor->id}}">{{$donor->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="sort" class="form-group">Sort By</label>
                                                <div class="row">
                                                    <div class="col-sm-6" style="padding-right: 5px">
                                                        <select name="sort" id="sort" class="form-control">
                                                            <option value="name">Name</option>
                                                            <option value="budget">Budget</option>
                                                            <option value="startDate">Start Date</option>
                                                            <option value="endDate">End Date</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6" style="padding-left: 5px">
                                                        <select name="order" id="sort" class="form-control">
                                                            <option value="asc" >Ascending</option>
                                                            <option value="desc" >Descending</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>--}}
                                    <div style="text-align: center">
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
                                    </ol>
                                    {{$authors->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
