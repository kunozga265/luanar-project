<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Donor;
use App\Models\Project;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class NewProject extends Component
{
    use WithFileUploads;

    public $authors, $donors;
    public $deliverables = [
        [
            'title' =>  '',
            'day'  =>  '',
            'month'  =>  '',
            'year'  =>  '',
        ]
    ];
    public $days = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
    public $months=['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    public $years;

    public $file;
    public $name;
    public $description;
    public $duration;
    public $startDate;
    public $endDate;
    public $currency;
    public $budget;
    public $pi;
    public $donor;
    public $collaborators=[];


    public function render()
    {
        $this->authors=Author::orderBy('firstName','asc')->get();
        $this->donors=Donor::orderBy('name','asc')->get();

        $currentYear = intval(date('Y'));
        $year=$currentYear-20;
        while ($year <= $currentYear+20) {
            $years[]=$year;
            $year++;
        }

        $this->years=$years;

        return view('livewire.new-project');
    }

    public function addDeliverable()
    {
        $this->deliverables[]= [
            'title' =>  '',
            'day'  =>  '',
            'month'  =>  '',
            'year'  =>  '',
        ];
    }

    public function removeDeliverable($key)
    {
        array_splice($this->deliverables,$key,1);
    }

    public function store()
    {
        $this->validate([
            'name'          =>  ['required'],
            'pi'            =>  ['required'],
            'description'   =>  ['required'],
            'donor'         =>  ['required'],
            'currency'      =>  ['required'],
            'budget'        =>  ['required'],
            'duration'      =>  ['required'],
            'startDate'     =>  ['required'],
            'endDate'       =>  ['required'],
            'file'          =>  ['required'],
            'deliverables'  =>  ['required'],
        ]);


        $fileName=Str::slug($this->name)."-".uniqid().".".$this->file->extension();
//        $this->file->move(public_path('files/projects'), $fileName);
        $this->file->storePubliclyAs('files/projects', $fileName,'public_uploads');

        $project=Project::create([
            "photo"             =>'files/projects/'.$fileName,
            'name'              =>$this->name,
            'description'       =>$this->description,
            "duration"          =>$this->duration,
            "startDate"         =>$this->startDate,
            "endDate"           =>$this->endDate,
            "currency"          =>$this->currency,
            "budget"            =>$this->budget,
            "author_id"         =>$this->pi,
            "donor_id"          =>$this->donor,
            "deliverables"      =>json_encode($this->deliverables),
        ]);

        //Attach Authors
        $project->collaborators()->attach($this->collaborators);

        return Redirect::route('projects');
    }
}
