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
                                <form method="post" action="{{route('articles.store')}}" class="createForm" enctype="multipart/form-data">
                                    @csrf
                                    <h4>Create Publication</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="title" class="form-group">Title</label>
                                            <input id="title" type="text" name="title"  class="form-control" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="abstract" class="form-group">Abstract</label>
                                            <textarea id="abstract" name="abstract"  class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="authors" class="form-group">Select Authors</label>
                                            <select id="authors" name="authors[]" class="form-control" multiple="multiple" >
                                                @foreach($authors as $author)
                                                    <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="keywords" class="form-group">Keywords</label>
                                            <input id="keywords" type="text" name="keywords"  class="form-control">
                                            <p style="font-size: 12px;">Separate keywords by a comma (,)</p>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="journals" class="form-group">Journal</label>
                                            <select id="journals" name="journal" class="form-control">
                                                <option value="">Select Journal</option>
                                                @foreach($journals as $journal)
                                                    <option value="{{$journal->id}}">{{$journal->title}} Vol. {{$journal->volume}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="type" class="form-group">Type Of</label>
                                            <select name="type" id="type" class="form-control">
                                                <option value="">Select Type</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="year" class="form-group">Publication Date</label>
                                            <select name="year" id="year" class="form-control" required>
                                                <option value="">Select Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{$year}}">{{$year}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="file" class="form-group">Upload File</label>
                                            <input id="file" type="file" name="file"  class="form-control" required>
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <input class="btn btn-primary" style="background: #03a100; margin-top: 12px"  type="submit" value="Upload">
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
