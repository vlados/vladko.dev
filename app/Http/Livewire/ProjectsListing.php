<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProjectsListing extends Component
{
    public $projects;
    public $tags;
    public $selected_tag = 'All';
    public $filtered_projects;
    public $latest_project_id;

    public function mount($projects)
    {
        $this->latest_project_id = $projects->first()->id;
        $this->filtered_projects = $this->projects->map(function ($project) {
            $project->latest = $project->id == $this->latest_project_id;

            return $project;
        });
    }

    public function updatedSelectedTag($tag)
    {
        $this->projects->map(function ($project) {
            $project->latest = $project->id == $this->latest_project_id;

            return $project;
        });
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
