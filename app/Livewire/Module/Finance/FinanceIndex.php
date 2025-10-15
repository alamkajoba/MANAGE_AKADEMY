<?php

namespace App\Livewire\Module\Finance;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Payment;
use App\Models\Finance;

#[Layout('layouts.app')]
class FinanceIndex extends Component{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


public $somme;
    public $total;
    public $totals;
    public $datej;
    

      public function getTotalFeesProperty(){
        
        $payments =Payment::with('fees')->get();
         return $payments->sum(function($payment) {
        return $payment->fees?->amount ?? 0;
    
    });
    }
    public function getTotalDepensesProperty()
{
    return Finance::sum('amount');
}

public function getSoldeProperty()
{
    return $this->totalFees - $this->totalDepenses;
}

    public function render()
    { 
        $counts = Payment::whereDate('created_at', Carbon::today())->get();
      
        return view('livewire.module.finance.finance-index',
        ['entrees' =>Payment::with(['fees', 'enrollment.student'])->latest()->paginate(4, ['*'], 'entreesPage'),
        'depenses' =>Finance::latest()->paginate(4, ['*'], 'depensesPage'),]);
    }
      }
