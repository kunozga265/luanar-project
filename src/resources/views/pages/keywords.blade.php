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
                                <div class="searchSection">
                                    <h4>Keywords {{is_object($keyword)?": ".$keyword->name:""}}</h4>

                                {{--    <div class="search-field">

                                        <label for="keywords" class="form-group">By Keywords</label>
                                        <div class="field">
                                            <i style="" class="fa fa-search"></i>
                                            <input type="text" id="keywords" name="keywords" class="form-control" style="">
                                        </div>

                                    </div>--}}

                                    <div class="keywords" style="margin-top: 12px">
                                        <div class="row">
                                            <div class="col-md-12">
{{--                                                <label for="type" class="form-group">Keywords</label>--}}
                                             {{--   <select name="type" id="type" class="form-control">
                                                    @foreach($keywords as $_keyword)
                                                        <option value="{{$_keyword->slug}}">
                                                            <a href="{{route('keywords',['slug'=>$_keyword->slug])}}"> {{$_keyword->name}}</a>
                                                        </option>
                                                    @endforeach
                                                </select>--}}
                                                @foreach($keywords as $_keyword)
                                                    @if($slug === $_keyword->slug)
                                                        <a class="active" href="{{route('keywords',['slug'=>$_keyword->slug])}}"> {{$_keyword->name}}</a>
                                                    @else
                                                        <a href="{{route('keywords',['slug'=>$_keyword->slug])}}"> {{$_keyword->name}}</a>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="single-event-text" style="padding:0; background-color: white">

                                @if(is_object($keyword))
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                        Articles
                                                        (<span>
                                                        {{$keyword->articles->count()}}
                                                    </span>)
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="listing">
                                                            @if($keyword->articles->count() == 0)
                                                                <p>No articles found.</p>
                                                            @endif

                                                            <ol>

                                                                @foreach($articles=$keyword->articles as $article)
                                                                    <li>
                                                                        <div>
                                                                            <b>{{$loop->index + 1}} .  </b> {{$article->title}} (  <a href="{{asset($article->file)}}">{{asset($article->file)}}</a>)
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
                                                                                <div><i class="mdi mdi-download"></i>{{$article->downloadCount}}</div>

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
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                        Datasets
                                                        (<span>
                                                      {{$keyword->datasets->count()}}
                                                    </span>)
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="listing">
                                                            @if($keyword->datasets->count() == 0)
                                                                <p>No datasets found.</p>
                                                            @endif

                                                            <ol>

                                                                @foreach($datasets=$keyword->datasets as $dataset)
                                                                    <li>
                                                                        <div>
                                                                            <b>{{$loop->index + 1}} .  </b> {{$dataset->title}} (  <a href="{{asset($dataset->file)}}">{{asset($dataset->file)}}</a>)
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
                                                                                <div><i class="mdi mdi-download"></i>{{$dataset->downloadCount}}</div>

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
                                @endif

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
