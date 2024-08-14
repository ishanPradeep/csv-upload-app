<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessCsv;
use App\Models\Contact;
use Illuminate\Http\Request;

class CsvController extends Controller
{

    public function index()
    {
        $contacts = Contact::paginate(10); // Display 10 records per page
        return view('contacts', compact('contacts'));
    }


    public function showForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:10240', // 10MB max size
        ]);

        $file = $request->file('csv_file');
        $path = $file->storeAs('csv', $file->hashName());

        // Dispatch the job to process CSV file
        ProcessCsv::dispatch(storage_path('app/' . $path));

        return redirect()->route('contacts.index')->with('success', 'CSV file uploaded and processing started.');
    }
}
