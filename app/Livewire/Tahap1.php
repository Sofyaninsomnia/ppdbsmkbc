<?php

namespace App\Livewire;

use App\Models\Jurusan;
use Livewire\WithPagination;
use App\Models\Pendaftaran;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Tahap1 extends Component
{
    use withPagination;

    public string $search = '';

    public $selectedJurusan = '';

    #[Computed]
    public function tahap_1()
    {
        return Pendaftaran::with('jurusan')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nisn', 'like', '%' . $this->search . '%')
                        ->orWhere('nama_lengkap', 'like', '%' . $this->search . '%')
                        ->orWhere('asal_sekolah', 'like', '%' . $this->search . '%')
                        ->orWhere('jenis_kelamin', 'like', '%' . $this->search . '%');
                })->when($this->selectedJurusan, function ($query) {
                    $query->where('jurusan_id', $this->selectedJurusan);
                });
            })
            ->latest()
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.tahap1', [
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
