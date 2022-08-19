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
                                <form method="post" action="{{route('projects.store')}}" class="createForm" enctype="multipart/form-data">
                                    @csrf
                                    <h4>Create</h4>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label for="name" class="form-group">Name</label>
                                            <input id="name" type="text" name="name"  class="form-control" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="description" class="form-group">Description</label>
                                            <textarea id="description" name="description"  class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="pi" class="form-group">Principle Investigator</label>
                                            <select id="pi" name="pi" class="form-control" required>
                                                <option value="">Select Principle Investigator</option>
                                                @foreach($authors as $author)
                                                    <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="collaborators" class="form-group">Collaborators</label>
                                            <select id="collaborators" name="collaborators[]" class="form-control" multiple="multiple" >
                                                @foreach($authors as $author)
                                                    <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="donor" class="form-group">Donor</label>
                                            <select id="donor" name="donor" class="form-control" required>
                                                <option value="">Select Donor</option>
                                                @foreach($donors as $donor)
                                                    <option value="{{$donor->id}}">{{$donor->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="currency" class="form-group">Currency</label>
                                            <select name="currency" id="currency" class="form-control" required>
                                                <option value="">Select Currency</option>
                                                <option value="$">US Dollar</option>
{{--                                                <option value="">Euro</option>--}}
                                                <option value="MK">Malawi Kwacha</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="budget" class="form-group">Budget</label>
                                            <input id="budget" name="budget" type="text"  class="form-control" required>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <label for="duration" class="form-group">Duration</label>
                                            <input id="duration" name="duration" type="text"  class="form-control" required>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="startDate" class="form-group">Start Year</label>
                                            <input id="startDate" name="startDate" type="text"  class="form-control" required>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label for="endDate" class="form-group">End Year</label>
                                            <input id="endDate" name="endDate" type="text"  class="form-control" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <label for="file" class="form-group">Upload Photo</label>
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
