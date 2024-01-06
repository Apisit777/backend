<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use App\Models\PG_users;
use App\Models\LoanDebt;
use App\Models\Test;
use App\Models\food;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function users()
    {
        // $users = PG_users::select(
        //     'pg_users.*'
        // )
        // ->get();

        // // dd($users->all());
        // // dd($users->pluck('user_name')->toArray());
        // return response()->json($users);

        // $users = User::select(
        //     'users.*'
        // )
        // ->get();

        // // dd($users->all());
        // // dd($users->pluck('user_name')->toArray());
        // return response()->json($users);

        $users = Test::select(
            'tests.*'
        )
        ->get();

        return response()->json($users);
    }

    public function get_detail_user() {
        $get_detail_user = Customer::select(
            'customers.*'
        )
        ->get();

        return response()->json($get_detail_user);
    }

    public function loan_debts()
    {
        $loanDdebts = LoanDebt::select("loan_debts.*")
            ->get();

        return response()->json($loanDdebts);
    }

    public function customer_code() {

        $loanDebts = DB::table('pgs')
        ->select("id", "code")
        ->get();

        // dd($loanDebts);

        foreach ($loanDebts as $loanDebt) {
            $dataarray_code = [];

            $item_code = LoanDebt::select("code")
            // $item_code = LoanDebt::count("code")
                ->where('code', '=', $loanDebt->code)
                ->get();

            // $loanDebt = $item_code->count();

            // dd($loanDebt);
            foreach ($item_code as $dataitem_code) {
                $dataarray_code[] = $dataitem_code->code;
            }

            $loanDebt->dataarray_code = count($dataarray_code);
            // dd($loanDebt->dataarray_code);
        }

        // dd($loanDebts);
        return response()->json($loanDebts);
    }

    public function get_code(Request $request)
    {
        if ((!$request->code)) {
            return '{}';
        }

        $code = DB::table('pgs')
        ->select(
            'pgs.*',
        )
        ->where('status', 1);

        if ($request->code) {
            $code = $code->where('code', '=', $request->code);
        }
        $code = $code->first();

        // dd($code);

        return response()->json($code);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required'
        ]);

        return food::create($request->all());
    }

    public function test_user_salary(Request $request)
    {
        if ( $request->saraly_name != NULL && count($request->saraly_name) > 0) {
            $i = 0;
            $x = 1;
            foreach ( $request->status as $key ) {
                if ( $request->saraly_name[$i] != '' ) {
                    $Customer_saraly = LoanDebt::create([
                        'seq' => $x,
                        'status' => (int) $request->status[$key],
                        'created_by' => Auth::user()->id,
                    ]);
                    ++$x;
                }
                ++$i;
            }
        }
    }

    public function edit_loan_debts(Request $request)
    {
        $loanDdebt = LoanDebt::select("loan_debts.*")
            ->first();

        return response()->json($loanDdebt);
    }

    public function update_loan_debts(Request $request)
    {
        // dd($request);
        if ($request) {
            DB::beginTransaction();
            try {
                $update_loan_debts = LoanDebt::find($request->id);
                if($update_loan_debts == null) {
                    $update_loan_debts = new LoanDebt;
                }

                // $update_loan_debts = LoanDebt::where('id', $request->id)->update([
                //     'loan_debt_code' => $request->loan_debt_code,
                //     'code' => $request->code,
                //     'name' => $request->name,
                //     'lastname' => $request->lastname,
                //     'data_entry_date' => $request->data_entry_date,
                //     'loan_type' => $request->loan_type,
                //     'financial_institution' => $request->financial_institution,
                //     'account_number' => $request->account_number,
                //     'on_off' => $request->on_off,
                //     'approval_limit' => $request->approval_limit,
                //     'outstanding_credit_limit' => $request->outstanding_credit_limit,
                //     'installment_payment_month' => $request->installment_payment_month,
                //     'principal_month' => $request->principal_month,
                //     'interest_month' => $request->interest_month,
                //     'account_sequence' => $request->account_sequence,
                //     'account_status' => $request->account_status,
                //     'installment_type' => $request->installment_type,
                //     'up_low' => $request->up_low,
                //     'note' => $request->note,
                // ]);

                $update_loan_debts->loan_debt_code = $request->loan_debt_code;
                $update_loan_debts->code = $request->code;
                $update_loan_debts->name = $request->name;
                $update_loan_debts->lastname = $request->lastname;
                $update_loan_debts->data_entry_date = $request->data_entry_date;
                $update_loan_debts->loan_type = $request->loan_type;
                $update_loan_debts->financial_institution = $request->financial_institution;
                $update_loan_debts->account_number = $request->account_number;
                $update_loan_debts->on_off = $request->on_off;
                $update_loan_debts->approval_limit = $request->approval_limit;
                $update_loan_debts->outstanding_credit_limit = $request->outstanding_credit_limit;
                $update_loan_debts->installment_payment_month = $request->installment_payment_month;
                $update_loan_debts->principal_month = $request->principal_month;
                $update_loan_debts->interest_month = $request->interest_month;
                $update_loan_debts->account_sequence = $request->account_sequence;
                $update_loan_debts->account_status = $request->account_status;
                $update_loan_debts->installment_type = $request->installment_type;
                $update_loan_debts->up_low = $request->up_low;
                $update_loan_debts->note = $request->note;
                $update_loan_debts->save();

                DB::commit();
                return response()->json(true);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json(['message' => 'Line '.$e->getLine().' => '.$e->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'File required.'], 422);
        }
    }
}
