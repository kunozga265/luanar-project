<div>
    <form method="post" action="{{route('projects.store')}}" class="createForm" enctype="multipart/form-data">
        @csrf
        <h4>Create</h4>

        <div class="row">
            <div class="col-sm-12">
                <label for="name" class="form-group">Name of Project or Consultancy</label>
                <input id="name" type="text" wire:model="name"  class="form-control" required>
                @error('name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-12">
                <label for="description" class="form-group">Description</label>
                <textarea id="description" wire:model="description"  class="form-control"></textarea>
                @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-12">
                <label for="pi" class="form-group">Principle Investigator</label>
                <select id="pi" wire:model="pi" class="form-control" required>
                    <option value="">Select Principle Investigator</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                    @endforeach
                </select>
                @error('pi') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-12">
                <label for="collaborators" class="form-group">Collaborators</label>
                <select id="collaborators" wire:model="collaborators" class="form-control" multiple="multiple" >
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->firstName}} {{$author->middleName}} {{$author->lastName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-12">
                <label for="donor" class="form-group">Donor</label>
{{--                <input id="donors" wire:model="donor" type="text" class="form-control">--}}
                <select id="donor" wire:model="donor" class="form-control" required>
                    <option value="">Select Donor</option>
                    @foreach($donors as $donor)
                        <option value="{{$donor->id}}">{{$donor->name}}</option>
                    @endforeach
                </select>
                @error('donor') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="currency" class="form-group">Currency</label>
                <select wire:model="currency" id="currency" class="form-control" required>
                    <option value="">Select Currency</option>
                    <option value="$">US Dollar</option>
                    {{--                                                <option value="">Euro</option>--}}
                    <option value="MK">Malawi Kwacha</option>
                </select>
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="budget" class="form-group">Budget</label>
                <input id="budget" wire:model="budget" type="text"  class="form-control" required>
                @error('budget') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-4 col-sm-12">
                <label for="duration" class="form-group">Duration</label>
                <input id="duration" wire:model="duration" type="text"  class="form-control" required>
                @error('duration') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="startDate" class="form-group">Start Year</label>
                <input id="startDate" wire:model="startDate" type="text"  class="form-control" required>
                @error('startDate') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-md-4 col-sm-6">
                <label for="endDate" class="form-group">End Year</label>
                <input id="endDate" wire:model="endDate" type="text"  class="form-control" required>
                @error('endDate') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col-sm-12">
                <label for="file" class="form-group">Upload Photo</label>
                <input id="file" type="file" wire:model="file"  class="form-control" required>
                @error('file') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>

            <div class="col-sm-12">
                <div>Deliverables</div>
                <hr>
                @foreach($deliverables as $key => $value)
                <div class="row">
                    <div class="col-md-5">
                        <label for="deliverable.{{$key}}">Deliverable {{$key + 1}}</label>
                        <textarea wire:model="deliverables.{{$key}}.title" id="deliverable-{{$key}}" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="col-md-5">
                        <label for="date.{{$key}}">Date {{$key + 1}}</label>
                        <div class="row" style="margin: 0">
                            <div class="col-sm-4">
                                <select wire:model="deliverables.{{$key}}.day" class="form-control">
                                    @foreach($days as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select wire:model="deliverables.{{$key}}.month" class="form-control">
                                    @foreach($months as $k=>$v)
                                        <option value="{{$k+1}}">{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select wire:model="deliverables.{{$key}}.year" class="form-control" >
                                    @foreach($years as $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
{{--                        <input  id='datetimepicker' name="completed_date"  class="form-control material__input" type="text">--}}
                    </div>
                    <div class="col-md-2">
                        <button wire:click.prevent="removeDeliverable({{$key}})" class="btn btn-error">Remove</button>
                    </div>

                </div>
                @endforeach
                @error('deliverables') <span class="text-danger error">{{ $message }}</span>@enderror

                <div>
                    <button wire:click.prevent="addDeliverable" class="btn btn-primary">Add</button>
                </div>
                <hr>
            </div>
        </div>
        <div style="text-align: center">
            <input wire:click.prevent="store" class="btn btn-primary" style="background: #03a100; margin-top: 12px"  type="submit" value="Upload">
        </div>

    </form>
</div>
