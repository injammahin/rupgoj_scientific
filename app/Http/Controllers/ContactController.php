<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Setting;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        
        $perPage = $request->get('per_page', 10);  // Default is 10
        $search = $request->get('search');

        $contacts = Contact::query()
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return view('backend.contacts', compact('contacts'));
    }
    
    public function create()
    {
        $settings = Setting::first(); 
       
        return view('frontend.contract_us', compact('settings'));  
    }

    public function store(Request $request)
    {
        // Validate form inputs along with math CAPTCHA
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
            'captcha' => 'required|numeric',
        ]);

        // Check if the user's input matches the generated CAPTCHA sum
        if ($request->input('captcha') != session('captcha_sum')) {
            return back()->withErrors(['captcha' => 'The math answer is incorrect. Please try again.'])->withInput();
        }

        // Save the contact message
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        // Clear the CAPTCHA from the session
        session()->forget('captcha_sum');

        return redirect()->route('frontend.contact.create')->with('success', 'Your message has been sent successfully!');
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->route('backend.contacts')->with('success', 'Contact deleted successfully');
    }
}
