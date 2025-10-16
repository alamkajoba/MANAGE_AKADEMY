<?php

namespace App\Livewire\Module\Finance;

use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Payment;
use App\Models\Finance;
use \App\Models\AcademicYear;

#[Layout('layouts.app')]

class FinanceIndex extends Component{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $dateDebut;
    public $dateFin;
    public function mount()
    {
        $this->dateDebut = null;
        $this->dateFin = null;
    }

    public function getTotalFeesProperty(){
        
        $currentYear = AcademicYear::where('status', 'active')->first();
            if (!$currentYear) {
        return 0;
            }
            $payments = Payment::with('fees')->where('academic_year_id', $currentYear->id)->get();
            return $payments->sum(function($payment) {
            return $payment->fees?->amount ?? 0;
            });
        }

    public function getTotalDepensesProperty()
        {
             $currentYear =AcademicYear::where('status', 'active')->first();
                if (!$currentYear) {
                    return 0;
        }
        return Finance::where('academic_year_id', $currentYear->id)->sum('amount');
    }

    public function getSoldeProperty()
        {
            return $this->totalFees - $this->totalDepenses;
        }

    public function render(){ 
        $currentYear = AcademicYear::where('status', 'active')->first();
        $depensesQuery = Finance::query();
            if ($currentYear) {
                $depensesQuery->where('academic_year_id', $currentYear->id);

            if ($this->dateDebut) {
                $depensesQuery->whereDate('created_at', '>=', $this->dateDebut);
            }
            if ($this->dateFin) {
                $depensesQuery->whereDate('created_at', '<=', $this->dateFin);
            }
        } 
            else {
                $depensesQuery->whereRaw('0=1');
            }
                return view('livewire.module.finance.finance-index', ['entrees' => $currentYear?
                Payment::with(['fees', 'enrollment.student'])
                ->where('academic_year_id', $currentYear->id)
                ->latest()
                ->paginate(3, ['*'], 'entreesPage'): collect(),'depenses' 
                => $depensesQuery->latest()->paginate(3, ['*'], 'depensesPage'),
    ]);
    }
}
