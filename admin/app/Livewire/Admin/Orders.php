<?php

namespace App\Livewire\Admin;

use App\Models\Order;

class Orders extends Paginator
{

    public function render()
    {
        return view('livewire.admin.orders', [
            'orders' => Order::query()
                ->with(['user', 'transaction'])
                ->withCount(['products'])
                ->when($this->search, fn($q) => $q->whereLikes(['user.name', 'user.email'], $this->search))
                ->paginate($this->limit)
        ]);
    }
}
