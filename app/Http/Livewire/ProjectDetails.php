<?php

namespace App\Http\Livewire;

use App\Models\GuestUser;
use App\Models\Project;
use Livewire\Component;

class ProjectDetails extends Component
{
    public $loading = true;
    public $likes = 123;
    public $like = false;
    public Project $project;
    protected $listeners = [
        'project-modal' => 'load',
        'hide-modal' => 'hide',
    ];
    public $visits;
    private GuestUser $user;

    public function mount()
    {
    }

    public function load($id)
    {
        $this->like = false;
        $this->loading = false;
        $this->project = Project::find($id);
        $this->visits = $this->project->visitLogs()->count();
        request()->visitor()->visit($this->project);
        $this->registerVisit();

        if ($this->project->isNotRegisteredAsLoveReactant()) {
            $this->project->registerAsLoveReactant();
        }
        $this->likes = $this->project->viaLoveReactant()->getReactionCounterOfType('Like')->getCount();
        $this->like = $this->project->viaLoveReactant()->isReactedBy($this->user);
//        sleep(5);
    }

    public function registerVisit()
    {
        $this->user = GuestUser::firstOrCreate([
            'session_id' => session()->getId(),
        ], [
            'ip' => request()->ip(),
        ]);
        if ($this->user->isNotRegisteredAsLoveReacter()) {
            $this->user->registerAsLoveReacter();
        }
    }

    public function updatedLike($change)
    {
        $this->registerVisit();
        $reacterFacade = $this->user->viaLoveReacter();
        $this->likes = $this->project->viaLoveReactant()->getReactionCounterOfType('Like')->getCount();
        if ($reacterFacade->hasReactedTo($this->project, 'Like')) {
            $reacterFacade->unreactTo($this->project, 'Like');
            $this->likes--;
        } else {
            $reacterFacade->reactTo($this->project, 'Like');
            $this->likes++;
        }
    }

    public function hide()
    {
        $this->loading = true;
    }

    public function render()
    {
        return view('livewire.project-details');
    }
}
