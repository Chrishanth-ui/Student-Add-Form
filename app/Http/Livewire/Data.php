<?php

namespace App\Http\Livewire;
use App\Models\Student;

use Livewire\Component;

/*
category init
date access-06-06-2022
access by- Chrishanth
*/




class Data extends Component
{

    #page variables
    public $name;
    public $course;
    public $email;
    public $duration;
    public $student_id = 0;

    #common variables
    public $data_list = [];
    public $search_key;

    #save data
    public function saveData()
    {

        //validate data
        $this->validate(
            [
                'name' => 'required',
                'course' => 'required|',
                'email' => 'required|',
                'duration' => 'required|'
            ]
        );

        if ($this->student_id == 0) {
        $detail = new Student();
        $detail->name = $this->name;
        $detail->course = $this->course;
        $detail->email = $this->email;
        $detail->duration = $this->duration;
        $detail->save();
        $this->clearData();
        session()->flash('add_message', 'success Saved');
    } else {
        
            $detail = Student::find($this->student_id);
            $detail->name = $this->name;
            $detail->course = $this->course;
            $detail->email = $this->email;
            $detail->duration = $this->duration;
            $detail->save();
            $this->clearData();
            session()->flash('add_message', 'success Update');
        }
        
    }

    #clear data
    public function clearData()
    {
        # code...
        $this->name = "";
        $this->course = "";
        $this->email = "";
        $this->duration = "";
        $this->student_id = 0;
        
    }

    #fetch data
    public function fetchData()
    {
        if ($this->search_key) {
            #search by key
            $this->data_list = Student::where('name', 'LIKE', '%' . $this->search_key . '%')->get();
        } else {
        
            $this->data_list = Student::all();
        }

    }

    #update
    public function updateData($id)
    {
        # code...
        $detail = Student::find($id);
        $this->name = $detail->name;
        $this->course = $detail->course;
        $this->email = $detail->email;
        $this->duration = $detail->duration;
        $this->student_id = $id;
    }

    #delete
    public function deleteData($id)
    {
        # code...
        $data = student::find($id);
        $data->delete();
    }
    
    
    public function render()
    {
        $this->fetchData();
        return view('livewire.data')->layout('layouts.navigation');
    }
}
