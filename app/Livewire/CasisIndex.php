<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Casis;
use App\Models\Jurusan;

class CasisIndex extends Component
{
    use WithPagination;

    public string $search = '';
    public $selectedJurusanId = '';

    protected $paginationTheme = 'bootstrap';

    #[Computed]
    public function casis()
    {
        return Casis::with('jurusan')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nik', 'like', '%' . $this->search . '%')
                        ->orWhere('nisn', 'like', '%' . $this->search . '%')
                        ->orWhere('nama', 'like', '%' . $this->search . '%')
                        ->orWhere('asal_sekolah', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->selectedJurusanId, function ($query) {
                $query->where('jurusan_id', $this->selectedJurusanId);
            })
            ->latest()
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.casis-index', [
            'jurusan'   => Jurusan::all()
        ]);
    }

    public function updatingPaginate()
    {
        $this->resetPage();
    }

    public function updatingSelectedJurusanId()
    {
        $this->resetPage();
    }
}
