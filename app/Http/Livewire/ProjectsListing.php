<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectsListing extends Component
{
    public $projects;
    public $tags;
    public $selected_tag = 'All';
    public $filtered_projects;

    public function mount($projects)
    {
        $this->filtered_projects = $projects;
    }

    public function updatedSelectedTag($tag)
    {
        $this->filtered_projects = $this->projects->filter(function ($project) use ($tag) {
            if ($tag == 'All' || $tag == '') {
                return true;
            }
            $tags = explode(',', $project->technologies);

            return in_array($tag, $tags);
        });
    }

    public function render()
    {
        return view('livewire.projects-listing');
    }
}
