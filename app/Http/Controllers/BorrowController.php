<?php

namespace App\Http\Controllers;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use App\Http\Requests\BorrowFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    /*
    public function __construct()
    {
        $this->authorizeResource(Borrow::class, 'borrow');
    }
    */
    public function index()
    {
        /*  PENDING
            REJECTED
            ACCEPTED
            RETURNED
        */
        $PENDINGrequests = Borrow::where('status','PENDING')->get();
        $REJECTEDrequests = Borrow::where('status','REJECTED')->get();
        $ACCEPTEDrequestsInTime = Borrow::where('status','ACCEPTED')->where('request_processed_at','<','daedline')->get();
        $ACCEPTEDrequestsLate = Borrow::where('status','ACCEPTED')->where('request_processed_at','>','daedline')->get();
        $RETURNEDrequests = Borrow::where('status','RETURNED')->get();

        //dd($PENDINGrequests);
        return view('borrows/list', [
            'PENDINGrequests' => $PENDINGrequests,
            'ACCEPTEDrequestsInTime' => $ACCEPTEDrequestsInTime,
            'ACCEPTEDrequestsLate' => $ACCEPTEDrequestsLate,
            'REJECTEDrequests' => $REJECTEDrequests,
            'RETURNEDrequests' => $RETURNEDrequests,
        ]);
    }

    public function create(Book $book)
    {
        // return view('books/create');


    }

    public function show(Borrow $borrow)
    {
        return view('borrows/detailBookRental', [
            'borrow' => $borrow
        ]);
    }


    public function store(Request $request)
    {

        $data= [
            'reader_id' => Auth::id(),
            'books_id' => $request->input('books_id'),
            'status' => $request->input('status')
        ];

        $borrow = Borrow::create($data);
        $book = Book::findOrFail($request->input('books_id'));
        $user = Auth::user();
        $book->borrows()->save($borrow);
        $user->readerBorrows()->save($borrow);
        return redirect()->route('borrows.show', $borrow);
    }

    public function edit($id)
    {
        $borrow = Borrow::find($id);
        return view('borrows/edit', [
            'borrow' => $borrow
        ]);
    }

    public function update(Request $request, $id) {
        $status = $request->input('status');
        $request_processed_at = null;
        $request_managed_by = null;
        $returned_at = null;
        $return_managed_by = null;
        $data = [];
        if($status == 'REJECTED' || $status == 'ACCEPTED' ){
            $request_processed_at = date('Y-m-d H:i:s');
            $request_managed_by = Auth::id();
        }

        else if($status == 'RETURNED'){
            $returned_at = date('Y-m-d H:i:s');
            $return_managed_by = Auth::id();
        }

        $data= [
            'status' => $status,
            'request_processed_at' => $returned_at,
            'return_managed_by' => $return_managed_by,
            'deadline ' => $request->input('deadline'),
            'returned_at' => $returned_at,
            'return_managed_by' => $return_managed_by
        ];

        $borrow = Borrow::findOrFail($id);
        $user = Auth::user();
        $borrow->update($data);
        $user->managedRequests()->save($borrow);
        $user->managedReturns()->save($borrow);
        //dd($borrow);
        return redirect()->route('borrows.index');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrows.index');
    }
}
