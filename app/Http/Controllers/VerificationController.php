<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify(Request $request)
    {
        $request->validate(['drug_id' => 'required|exists:drugs,id']);
        $drug = Drug::findOrFail($request->drug_id);

        // Record verification event
        Verification::create([
            'drug_id' => $drug->id,
            'verified_at' => now(),
        ]);

        return response()->json(['status' => 'Drug verified successfully']);
    }

}
