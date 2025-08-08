<?php

namespace App\Livewire\Admin;

use App\Models\QuoteRequest;
use Livewire\Component;

class QuoteRequests extends Paginator
{
    public function render()
    {
        return view('livewire.admin.quote-requests', [
            'requests' => QuoteRequest::query()
                ->when($this->search, fn($q) => $q->whereLikes(['first_name', 'last_name', 'email', 'phone_number', 'organization_name', 'budget', 'category', 'border_length'], $this->search))
                ->paginate($this->limit)
        ]);
    }

    public function deleteRequest($id)
    {
        QuoteRequest::where('id', $id)->delete();
    }
}
