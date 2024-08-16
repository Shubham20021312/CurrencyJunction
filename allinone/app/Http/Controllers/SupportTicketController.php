<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\MerchantRequest;
use Illuminate\Support\Str;
use Auth;
class SupportTicketController extends Controller
{
    public function suppot_ticket(){

        $user_id = Auth::user()->id;
        $tickets = SupportTicket::where('user_id',$user_id)->get();
        // dd($user_id);
        return view('support_ticket', compact('tickets'));
    }

    public function store(Request $request)
    {
        $user_id =Auth::user()->id;
        $request->validate([
            'category' => 'required',
            'subject' => 'required|max:255',
            'description' => 'required',
            'attachment' => 'nullable|file|max:5120', 
        ]);

        // Handle file upload
        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('public/attachments');
        }

        // Create new SupportTicket instance
        $ticket = new SupportTicket();
        $ticket->category = $request->category;
        $ticket->subject = $request->subject;
        $ticket->description = $request->description;
        $ticket->attachment = $attachmentPath;
        $ticket->status = 'Processing';
        $ticket->ticket_id =  Str::random(8); 
        $ticket->user_id = $user_id;
        $ticket->save();

        return redirect()->route('suppot_ticket')->with('success', 'Ticket submitted successfully!');
    }

    public function show_ticket()
    {
        $tickets = SupportTicket::all();
        $totalCount = MerchantRequest::all()->count();
    
        $buy_rates = MerchantRequest::where('type', 'buy')
        ->where('status', 'approved')
        ->orderBy('created_at', 'asc')
        ->get();
    
        $total_amount_buy = $buy_rates->sum('amount');
        $sell_rates = MerchantRequest::where('type', 'sell')
            ->where('status', 'approved')
            ->orderBy('created_at', 'asc')
            ->get();
    
        $total_amount_sell = $sell_rates->sum('amount');
        $performance = ($total_amount_buy + $total_amount_sell) / 100;

        return view ('admin.support_ticket',compact('tickets','totalCount', 'total_amount_buy', 'total_amount_sell', 'performance'));
    }

    public function change_status(Request $request)
    {      
        $ticket_id = $request->input('ticketId');
        $status = $request->input('status');
        $ticket = SupportTicket::where('id', $ticket_id)->first();
        if ($ticket) {
            $ticket->status = $status;
            $ticket->save();
    
            return response()->json(['message' => 'Status updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Ticket not found'], 404);
        }
    }
   
}
