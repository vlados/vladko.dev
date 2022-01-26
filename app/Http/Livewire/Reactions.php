<?php

namespace App\Http\Livewire;

use App\Models\GuestUser;
use App\Models\Project;
use App\View\Components\SvgIcon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Reactions extends Component
{
    use LivewireAlert;

    public bool $liked = false;
    public int $likes = 0;
    public bool $bravo = false;
    public int $bravos = 0;
    public bool $loved = false;
    public int $loves = 0;
    public Project $project;
    public GuestUser $user;

    public function mount()
    {
        $this->user = GuestUser::firstOrCreate([
            'session_id' => session()->getId(),
        ], [
            'ip' => request()->ip(),
        ]);
        if ($this->user->isNotRegisteredAsLoveReacter()) {
            $this->user->registerAsLoveReacter();
        }

        if ($this->project->isNotRegisteredAsLoveReactant()) {
            $this->project->registerAsLoveReactant();
        }
        $this->likes = $this->project->viaLoveReactant()->getReactionCounterOfType('Like')->getCount();
        $this->bravos = $this->project->viaLoveReactant()->getReactionCounterOfType('Bravo')->getCount();
        $this->loves = $this->project->viaLoveReactant()->getReactionCounterOfType('Love')->getCount();

        $this->liked = $this->project->viaLoveReactant()->isReactedBy($this->user, 'Like');
        $this->loved = $this->project->viaLoveReactant()->isReactedBy($this->user, 'Love');
        $this->bravo = $this->project->viaLoveReactant()->isReactedBy($this->user, 'Bravo');
    }

    public function render()
    {
        return view('livewire.reactions');
    }

    public function updatedLiked()
    {
        $this->toggleReaction('Like', $this->likes, 'thumbs-up');
    }

    public function updatedLoved()
    {
        $this->toggleReaction('Love', $this->loves, 'heart');
    }

    public function updatedBravo()
    {
        $this->toggleReaction('Bravo', $this->bravos, 'hands-clapping');
    }

    private function toggleReaction(string $reactionType, &$reactionsCount, $icon)
    {
        $iconClass = new SvgIcon('solid', $icon, 'w-3.5 h-3.5 fill-current mx-2 inline');
        $icon = $iconClass->render();
        $reacterFacade = $this->user->viaLoveReacter();
        if ($reacterFacade->hasReactedTo($this->project, $reactionType)) {
            $reacterFacade->unreactTo($this->project, $reactionType);
            $this->alert('success', '<span class="flex items-center">Your reaction ' . $icon . '<strong class="mr-2">' . $reactionType . '</strong> was removed</span>', [
                'showCloseButton' => false,

            ]);
            $reactionsCount--;
        } else {
            $reacterFacade->reactTo($this->project, $reactionType);
            $this->alert('success', '<span class="flex items-center">You reacted to the project with ' . $icon . '<strong>' . $reactionType . '</strong></span>', [
                'showCloseButton' => false,
            ]);
            $reactionsCount++;
        }
    }
}
