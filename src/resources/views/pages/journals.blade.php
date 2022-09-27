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
                                <form method="post" action="{{route('journals.store')}}" class="searchSection image-placeholder">
                                    @csrf
                                    <h4>Journals</h4>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="title" class="form-group">Title</label>
                                            <input id="title" name="title" type="text"  class="form-control" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="volume" class="form-group">Volume</label>
                                            <input id="volume" name="volume" type="text"  class="form-control">
                                        </div>
                                    </div>

                                    <div style="text-align: center">
                                        <input class="btn btn-primary" style="background: #03a100; margin-top: 6px"  type="submit" value="Upload">
                                    </div>

                                </form>
                            </div>
                            <div class="single-event-text" style="padding:0; background-color: white">

                                <div class="listing">

                                    <ol>
                                        @foreach($journals as $journal)
                                        <li>
                                            <form method="post" action="{{route('journals.trash',['id'=>$journal->id])}}">
                                                @csrf
                                                <div>
                                                    {{$journal->title}}  Vol. {{$journal->volume}}
                                                </div>
                                                <input class="btn btn-primary" style="background: #cb0b3c;" type="submit" value="Delete">
                                            </form>
                                            <hr>
                                        </li>
                                        @endforeach
                                    </ol>
                                    {{$journals->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
