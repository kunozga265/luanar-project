<x-app-layout>
    <div class="event-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <x-navigation></x-navigation>

                      {{--  <div class="single-sidebar-widget" style="margin:0">
                            <div class="single-item" style="margin-top:20px">
                                <div class="owl-carousel owl-theme">
                                   @foreach($projects as $project)
                                        <div class="row project-single">
                                            <div class="image-placeholder" style="background-image: url({{asset($project->photo)}})">
                                            </div>

                                            <div class="">
                                                <div class="header">
                                                    <h4>{{strtoupper($project->name)}}</h4>
                                                    <p class="font-weight-600" style="margin-bottom: {{$project->collaborators->count()>0?'0':'10px'}}">P.I.:
                                                        <a href="{{route('experts.show',['id'=>$project->author->id])}}">{{$project->author->title}} {{$project->author->firstName}} {{$project->author->middleName}} {{$project->author->lastName}}</a></p>
                                                    @if($project->collaborators->count()>0)
                                                        <p class="font-weight-600">Collaborators:
                                                            @foreach($project->collaborators as $collaborator)
                                                                @if($loop->first)
                                                                    <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                @elseif($loop->last)
                                                                    & <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                @else
                                                                    , <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                @endif

                                                            @endforeach
                                                        </p>
                                                    @endif
                                                    <p>{{$project->description}}</p>
                                                </div>
                                                <div class="details">
                                                    <p>Project Cost: {{$project->currency}}{{number_format($project->budget)}}</p>
                                                    <p>{{$project->startDate??""}}{{$project->endDate?"-$project->endDate":""}} {{$project->duration?"($project->duration)":""}}</p>
                                                    <p>Funder: {{$project->donor->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>--}}
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="event-details-content">
                        <div class="single-event-item" style="padding:0">
                            <div class="single-event-image" style="border-bottom: 1px solid #e1e1e1;">
{{--                                <form method="post" action="{{route('projects.search')}}" class="searchSection projectsSearchSection image-placeholder">--}}
                                <form method="post" action="{{route('projects.search')}}" class="searchSection">
                                    @csrf
                                    <h4>Search</h4>

                                    <div class="search-field">

                                        <label for="title" class="form-group">By Name</label>
                                        <div class="field">
{{--                                            <i style="" class="fa fa-search"></i>--}}
                                            <input type="text" id="title" name="name" class="form-control" style="" >
                                        </div>

                                    </div>

                                    <div class="search-filters">
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
                                    </div>
                                    <div style="text-align: center">
                                        <input class="btn btn-primary" style="background: #03a100;"  type="submit" value="Search">
                                    </div>

                                </form>
                            </div>
                            <div class="single-event-text" style="padding:0; background-color: white">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    Unverified Projects
                                                    (<span>
                                                        @if(is_object($unverifiedProjects))
                                                            {{$unverifiedProjects->count()}}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>)
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                            <div class="panel-body" style="    background-color: #f6f6f6;">
                                                <div class="listing">
                                                    @if(is_object($unverifiedProjects))
                                                        @if($unverifiedProjects->count() == 0)
                                                            <p>No projects found.</p>
                                                        @endif

                                                        <ol>
                                                            <div class="owl-carousel owl-theme">
                                                            @foreach($unverifiedProjects as $project)
                                                                <li>
                                                                    <div class="row project-single">
                                                                        <div class=" col-sm-6 col-md-4 image-placeholder" style="background-image: url({{asset($project->photo)}})">
                                                                        </div>

                                                                        <div class=" col-sm-6 col-md-8">
                                                                            <div class="header">
                                                                                <h4>{{strtoupper($project->name)}}</h4>
                                                                                <p class="font-weight-600" style="margin-bottom: {{$project->collaborators->count()>0?'0':'10px'}}">P.I.:
                                                                                    <a href="{{route('experts.show',['id'=>$project->author->id])}}">{{$project->author->title}} {{$project->author->firstName}} {{$project->author->middleName}} {{$project->author->lastName}}</a></p>
                                                                                @if($project->collaborators->count()>0)
                                                                                    <p class="font-weight-600">Collaborators:
                                                                                        @foreach($project->collaborators as $collaborator)
                                                                                            @if($loop->first)
                                                                                                <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                                            @elseif($loop->last)
                                                                                                & <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                                            @else
                                                                                                , <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                                            @endif

                                                                                        @endforeach
                                                                                    </p>
                                                                                @endif
                                                                                <p>{{$project->description}}</p>
                                                                            </div>
                                                                            <div class="details">
                                                                                <p>Project Cost: {{$project->currency}}{{number_format($project->budget)}}</p>
                                                                                <p>{{$project->startDate??""}}{{$project->endDate?"-$project->endDate":""}} {{$project->duration?"($project->duration)":""}}</p>
                                                                                <p>Funder: {{$project->donor->name}}</p>
                                                                            </div>

                                                                            <div>
                                                                                <table>
                                                                                    <tr>
                                                                                        <th>No.</th>
                                                                                        <th>Deliverable</th>
                                                                                        <th>Date</th>
                                                                                    </tr>
                                                                                    @foreach($deliverables=json_decode($project->deliverables) as $key=>$value)
                                                                                    <tr>
                                                                                        <td>{{$key +1}}</td>
                                                                                        <td>{{$value->title}}</td>
                                                                                        <td>{{"$value->day/$value->month/$value->year"}}</td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                </table>
                                                                            </div>
                                                                            <div>
                                                                                <form method="post" action="{{route('projects.verify',['id'=>$project->id])}}">
                                                                                    @csrf
                                                                                    <input class="btn btn-primary" style="background: #03a100; margin-top: 12px"  type="submit" value="Verify">
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                            </div>
                                                        </ol>
                                                    @else
                                                        <p>No projects found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing">
                                    <ol>
                                        <a href="{{route('projects.create')}}" class="btn btn-primary" style="background: #03a100;" >Upload Project <i class="mdi mdi-arrow-up"></i></a>
                                        <hr>
                                        @foreach($projects as $project)
                                        <li>
                                            <div class="row project-single">
                                                <div class=" col-sm-6 col-md-4 image-placeholder" style="background-image: url({{asset($project->photo)}})">
                                                </div>

                                                <div class=" col-sm-6 col-md-8">
                                                    <div class="header">
                                                        <h4>{{strtoupper($project->name)}}</h4>
                                                        <p class="font-weight-600" style="margin-bottom: {{$project->collaborators->count()>0?'0':'10px'}}">P.I.:
                                                            <a href="{{route('experts.show',['id'=>$project->author->id])}}">{{$project->author->title}} {{$project->author->firstName}} {{$project->author->middleName}} {{$project->author->lastName}}</a></p>
                                                        @if($project->collaborators->count()>0)
                                                        <p class="font-weight-600">Collaborators:
                                                            @foreach($project->collaborators as $collaborator)
                                                                @if($loop->first)
                                                                    <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                @elseif($loop->last)
                                                                    & <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                @else
                                                                    , <a href="{{route('experts.show',['id'=>$collaborator->id])}}"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                @endif

                                                            @endforeach
                                                        </p>
                                                        @endif
                                                        <p>{{$project->description}}</p>
                                                    </div>
                                                    <div class="details">
                                                        <p>Project Cost: {{$project->currency}}{{number_format($project->budget)}}</p>
                                                        <p>{{$project->startDate??""}}{{$project->endDate?"-$project->endDate":""}} {{$project->duration?"($project->duration)":""}}</p>
                                                        <p>Funder: {{$project->donor->name}}</p>
                                                    </div>

                                                    <div>
                                                        <table>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Deliverable</th>
                                                                <th>Date</th>
                                                            </tr>
                                                            @foreach($deliverables=json_decode($project->deliverables) as $key=>$value)
                                                                <tr>
                                                                    <td>{{$key +1}}</td>
                                                                    <td>{{$value->title}}</td>
                                                                    <td>{{"$value->day/$value->month/$value->year"}}</td>
                                                                </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                        @endforeach
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
