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
                                <div class="searchSection">
                                    <div class="row author-single">
                                        <div class="avatar">
                                            <div class="image-placeholder" style="background-image: url({{asset($author->avatar)}})">
                                            </div>
                                        </div>

                                        <div class="">
                                            <div class="header">
                                                <div>{{$author->title}} {{$author->firstName}} {{$author->middleName}} <span class="font-weight-600">{{$author->lastName}}</span></div>
                                                {{--                                                        <p>{{$author->biography}}</p>--}}
                                            </div>
                                            <div class="details">
                                                <div>Projects Led: {{$author->projects()->where('verified',1)->count()}}</div>
                                                <div>Projects Collaborated: {{$author->collaborations->where('verified',1)->count()}}</div>
                                                <div>Publications: {{$author->articles->where('verified',1)->count()}}</div>
                                            </div>
                                            <form method="post" action="{{route('experts.delete',['id'=>$author->id])}}">
                                                @csrf
                                                <div style="text-align: center">
                                                    <a href="{{route('experts.edit',['id'=>$author->id])}}" class="btn btn-primary" style="background: #03a100;" >Edit</a>
                                                    <input class="btn btn-primary" style="background: #cb0b3c;" type="submit" value="Delete">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-event-text" style="padding:0; background-color: white">

                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#biography">
                                                    Biography
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="biography" class="panel-collapse collapse-in">
                                            <div class="panel-body">
                                                <div class="listing">
                                                  {{$author->biography}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                    Projects Led
                                                    (<span>
                                                        @if(is_object($author->projects))
                                                            {{$author->projects()->where('verified',1)->count()}}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>)
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="listing">
                                                    @if(is_object($author))
                                                        @if($author->projects()->where('verified',1)->count() == 0)
                                                            <p>No projects found.</p>
                                                        @endif

                                                        <ol>

                                                            @foreach($projects=$author->projects()->where('verified',1)->get() as $project)
                                                                <li>
                                                                    <div class="row project-single">
                                                                        <div class=" col-sm-6 col-md-4 image-placeholder" style="background-image: url({{asset($project->photo)}})">
                                                                        </div>

                                                                        <div class=" col-sm-6 col-md-8">
                                                                            <div class="header">
                                                                                <h4>{{strtoupper($project->name)}}</h4>
                                                                                <p class="font-weight-600" style="margin-bottom: {{$project->collaborators->count()>0?'0':'10px'}}">P.I.:
                                                                                    <a href="#">{{$project->author->title}} {{$project->author->firstName}} {{$project->author->middleName}} {{$project->author->lastName}}</a></p>
                                                                                @if($project->collaborators->count()>0)
                                                                                    <p class="font-weight-600">Collaborators:
                                                                                        @foreach($project->collaborators as $collaborator)
                                                                                            @if($loop->first)
                                                                                                <a href="#"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                                            @elseif($loop->last)
                                                                                                & <a href="#"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
                                                                                            @else
                                                                                                , <a href="#"><span>{{$collaborator->title}} {{$collaborator->firstName}} {{$collaborator->middleName}} {{$collaborator->lastName}}</span></a>
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
                                                                    <hr>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    @else
                                                        <p>No projects found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    Projects Collaborated
                                                    (<span>
                                                        @if(is_object($author->collaborations))
                                                            {{$author->collaborations()->where('verified',1)->count()}}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>)
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="listing">
                                                    @if(is_object($author))
                                                        @if($author->collaborations()->where('verified',1)->count() == 0)
                                                            <p>No projects found.</p>
                                                        @endif

                                                        <ol>

                                                            @foreach($projects=$author->collaborations()->where('verified',1)->get() as $project)
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
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    @else
                                                        <p>No projects found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                    Publications
                                                    (<span>
                                                        @if(is_object($author->articles))
                                                            {{$author->articles()->where('verified',1)->count()}}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>)
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="listing">
                                                    @if(is_object($author))
                                                        @if($author->articles()->where('verified',1)->count() == 0)
                                                            <p>No publications found.</p>
                                                        @endif

                                                        <ol>

                                                            @foreach($articles=$author->articles()->where('verified',1)->get() as $article)
                                                                <li>
                                                                    <div>
                                                                        <b>{{$loop->index + 1}} .  </b> {{$article->title}}
                                                                    </div>
                                                                    <div class="keywords">
                                                                        @foreach($keywords=$article->keywords as $_keyword)
                                                                            <a href="{{route('keywords',['slug'=>$_keyword->slug])}}"> {{$_keyword->name}}</a>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="item__footer">
                                                                        <div class="authors">
                                                                            <div>
                                                                                @foreach($authors=$article->authors as $author)
                                                                                    @if($loop->last)
                                                                                        {{$author->firstName[0]}}. {{$author->lastName}}
                                                                                    @else
                                                                                        {{$author->firstName[0]}}. {{$author->lastName}},
                                                                                    @endif

                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                        <div class="date">
                                                                            <div><i class="mdi mdi-calendar"></i> {{$article->month ?? ''}} {{$article->year}}</div>
{{--                                                                            <div><i class="mdi mdi-download"></i>{{$article->downloadCount}}</div>--}}
                                                                            <div><a href="{{asset($article->file)}}" class="font-weight-600" target="_blank">Download <i class="mdi mdi-download"></i></a></div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    @else
                                                        <p>No publications found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                    Datasets
                                                    (<span>
                                                        @if(is_object($author->datasets))
                                                            {{$author->datasets()->where('verified',1)->count()}}
                                                        @else
                                                            0
                                                        @endif
                                                    </span>)
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="listing">
                                                    @if(is_object($author))
                                                        @if($author->datasets()->where('verified',1)->count() == 0)
                                                            <p>No datasets found.</p>
                                                        @endif

                                                        <ol>

                                                                @foreach($datasets=$author->datasets()->where('verified',1)->get() as $dataset)
                                                                    <li>
                                                                        <div>
                                                                            <b>{{$loop->index + 1}} .  </b> {{$dataset->title}}
                                                                        </div>
                                                                        <div class="keywords">
                                                                            @foreach($keywords=$dataset->keywords as $_keyword)
                                                                                <a href="{{route('keywords',['slug'=>$_keyword->slug])}}"> {{$_keyword->name}}</a>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="item__footer">
                                                                            <div class="authors">
                                                                                <div>
                                                                                    @foreach($authors=$dataset->authors as $author)
                                                                                        @if($loop->last)
                                                                                            {{$author->firstName[0]}}. {{$author->lastName}}
                                                                                        @else
                                                                                            {{$author->firstName[0]}}. {{$author->lastName}},
                                                                                        @endif

                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <div class="date">
                                                                                <div><i class="mdi mdi-calendar"></i> {{$dataset->month ?? ''}} {{$dataset->year}}</div>
{{--                                                                                <div><i class="mdi mdi-download"></i>{{$dataset->downloadCount}}</div>--}}
                                                                                <div><a href="{{asset($dataset->file)}}" class="font-weight-600" target="_blank">Download <i class="mdi mdi-download"></i></a></div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    </li>
                                                                @endforeach
                                                            </ol>
                                                    @else
                                                        <p>No datasets found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
