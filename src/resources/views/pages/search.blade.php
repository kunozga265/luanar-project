<x-app-layout>
    <div class="event-details-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar-widget">
                        <x-navigation></x-navigation>
                        @include('components.sidebar')
                    </div>
                </div>
                <div class="col-md-9">

                    <div class="event-details-content">
                        <div class="single-event-item" style="padding:0">
                            <div class="single-event-image" style="border-bottom: 1px solid #e1e1e1;">
                                <form method="post" action="{{route('search')}}" class="searchSection">
                                    @csrf
                                    <h4>Search</h4>

                                    <div class="search-field">

                                        <label for="title" class="form-group">By Title</label>
                                        <div class="field">
{{--                                            <i style="" class="fa fa-search"></i>--}}
                                            <input type="text" id="title" name="title" class="form-control" style="" value="{{$title??''}}">
                                        </div>

                                    </div>

                                    <div class="search-filters">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="authors" class="form-group">By Authors</label>
                                                <select id="authors" name="author" class="form-control">
                                                    <option value="">Select Author</option>
                                                    @foreach($authors as $author)
                                                        @if($authorId == $author->id)
                                                            <option value="{{$author->id}}" selected>{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                                                        @else
                                                            <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                                                        @endif

                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="type" class="form-group">Type Of</label>
                                                <select name="type" id="type" class="form-control">
                                                    <option value="">Select Type</option>
                                                    @foreach($types as $type)
                                                        @if($typeId == $type->id)
                                                            <option value="{{$type->id}}" selected>{{$type->name}}</option>
                                                        @else
                                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <label for="sort" class="form-group">Sort By</label>
                                                <div class="row">
                                                    <div class="col-sm-6" style="padding-right: 5px">
                                                        <select name="sort" id="sort" class="form-control">
                                                            <option value="title" {{$sort=='title'?'selected':""}}>Title</option>
                                                            <option value="year" {{$sort=='year'?'selected':""}}>Date</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6" style="padding-left: 5px">
                                                        <select name="order" id="sort" class="form-control">
                                                            <option value="asc" {{$order=='asc'?'selected':""}}>Ascending</option>
                                                            <option value="desc" {{$order=='desc'?'selected':""}}>Descending</option>
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
                                                    Articles
                                                    (<span>
                                                        @if(is_object($articles))
                                                            {{$articles->count()}}
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
                                                    @if(is_object($articles))
                                                        @if($articles->count() == 0)
                                                            <p>No articles found.</p>
                                                        @endif

                                                        <ol>

                                                            @foreach($articles as $article)
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
                                                        <p>No articles found.</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                    Datasets
                                                    (<span>
                                                        @if(is_object($datasets))
                                                            {{$datasets->count()}}
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
                                                    @if(is_object($datasets))
                                                        @if($datasets->count() == 0)
                                                            <p>No datasets found.</p>
                                                        @endif

                                                        <ol>

                                                                @foreach($datasets as $dataset)
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
