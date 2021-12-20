<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Contact extends Component
{
    use LivewireAlert;
    public $first_name = null;
    public $last_name = null;
    public $company = null;
    public $mail = null;
    public $message = null;

    protected $rules = [
        'first_name' => 'required|min:3',
        'last_name' => 'required|min:3',
        'company' => '',
        'mail' => 'required|email',
        'message' => 'required|min:10',
    ];

    public function render()
    {
        return view('livewire.contact');
    }

    public function updated($key)
    {
        $this->validateOnly($key);
    }

    public function submit()
    {
        $data = $this->validate();
        dispatch(function () use ($data) {
            Mail::to('vlados.01@gmail.com')->send(new ContactMail($data));
        });
        $this->alert('success', trans('Thank you! I will get back to you as soon as possible!'));
        $this->reset();
    }
}
