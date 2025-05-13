<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\BoostOrder;


use App\Models\Hiring;

class PaymentController extends Controller
{
    public function verifyPaypal(Request $request)
    {
        $str = $request->oid;
        $parts = explode('-', $str);
        $firstPart = $parts[0];

        if ($request->q == 'fu') {
            return back()->with('error', 'Payment Failed');
        }

        $productID = $firstPart;
        $refrenceID = $request->refId ?? 'FAKE_REF_' . rand(1000, 9999);
        $amount = $request->amt;

        $expiryDays = $amount / 250;
        $dateExpired = Carbon::now()->addDays($expiryDays);

        // -------------------------------
        // 🧪 FAKE PAYMENT SUCCESS BLOCK
        // -------------------------------
        $fakeResponseCode = 'Success'; // You can toggle this manually

        if ($fakeResponseCode === 'Success') {
            $transactionData = new BoostOrder();
            $transactionData->employer_id = auth()->id();
            $transactionData->package_id = $productID;
            $transactionData->package_price = $amount;
            $transactionData->tnxID = $refrenceID;
            $transactionData->payment_method = 'Fake Esewa';
            $transactionData->isActive = 1;
            $transactionData->date_purchased = Carbon::now();
            $transactionData->date_expired = $dateExpired;
            $transactionData->save();

            $hiring = Hiring::where('id', $productID)->first();
            if ($hiring) {
                $hiring->isBoosted = 'yes';
                $hiring->save();
            }

            return redirect()->back()->with('success', 'Fake Payment Successful');
        }

        return redirect()->back()->with('error', 'Fake Payment Failed');
    }
}