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
                                <form method="post" action="{{route('experts.update',['id'=>$author->id])}}" class="createForm" enctype="multipart/form-data">
                                    @csrf
                                    <h4>Edit Expert</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="title" class="form-group">Title</label>
                                            <input value="{{$author->title}}" id="title" type="text" name="title"  class="form-control" placeholder="Dr." required>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="firstName" class="form-group">First Name</label>
                                            <input value="{{$author->firstName}}" id="firstName" name="firstName" type="text"  class="form-control" required>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="middleName" class="form-group">Middle Name</label>
                                            <input value="{{$author->middleName}}" id="middleName" name="middleName" type="text"  class="form-control">
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="lastName" class="form-group">Last Name</label>
                                            <input value="{{$author->lastName}}" id="lastName" name="lastName" type="text"  class="form-control" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="biography" class="form-group">Biography</label>
                                            <textarea id="biography" name="biography"  class="form-control">{{$author->biography}}</textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="file" class="form-group">Upload Photo</label>
                                            <input id="file" type="file" name="file"  class="form-control">
                                        </div>
                                    </div>
                                    <div style="text-align: center">
                                        <input class="btn btn-primary" style="background: #03a100; margin-top: 12px"  type="submit" value="Update">
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
