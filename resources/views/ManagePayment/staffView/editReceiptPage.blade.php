<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            Edit User Payment Details
        </div>
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <form action="{{route('update', $paymentDetails->id)}}" method="post">
                @csrf
                @method('post')
                <table class="rounded-xl px-4">
                    <tbody >
                        <tr>
                            <td class="px-4 py-2"><label>Card Bank</label></td>
                            <td class="px-4 py-2 w-3/4"><input type="text" name="cardBank" value="{{ $paymentDetails->cardBank }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Number</label></td>
                            <td class="px-4 py-2"><input type="text" name="cardNum" value="{{ $paymentDetails->cardNum }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card CVV</label></td>
                            <td class="px-4 py-2"><input type="number" name="CVV" value="{{ $paymentDetails->cardCVV }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" step=".01"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Expiration Date</label></td>
                            <td class="px-4 py-2"><input type="month" name="expiration" value="{{ $paymentDetails->cardExpirationDate }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" step=".01"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder Name</label></td>
                            <td class="px-4 py-2"><input type="text" name="holderName" value="{{ $paymentDetails->cardholderName }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder State</label></td>
                            <td class="px-4 py-2"><input type="text" name="holderState" value="{{ $paymentDetails->cardholderState }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder City</label></td>
                            <td class="px-4 py-2"><input type="text" name="holderCity" value="{{ $paymentDetails->cardholderCity }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder Postal Code</label></td>
                            <td class="px-4 py-2"><input type="number" name="holderPostal" value="{{ $paymentDetails->cardholderPostalCode }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>E-Wallet Bank</label></td>
                            <td class="px-4 py-2"><input type="text" name="walletBank" value="{{ $paymentDetails->eWalletbank }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>E-Wallet Account Number</label></td>
                            <td class="px-4 py-2"><input type="text" name="walletAcc" value="{{ $paymentDetails->eWalletAccNum }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Parent ID</label></td>
                            <td class="px-4 py-2"><input type="text" name="parentID" value="{{ $paymentDetails->parent_id }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Payment Method</label></td>
                            <td class="px-4 py-2"><input type="text" name="payMethod" value="{{ $paymentDetails->payment_method }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Payment Owed</label></td>
                            <td class="px-4 py-2"><input type="number" name="owed" value="{{ $paymentDetails->payment_owed }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Payment Made</label></td>
                            <td class="px-4 py-2"><input type="number" name="payed" value="{{ $paymentDetails->payment_made }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end px-4 py-2">
                    <div class="px-4">
                        <input type="reset" value="Reset" class="btn border border-slate-400 bg-gray-400 px-3 py-2 rounded-xl hover:bg-gray-300">
                    </div>
                    <div class="px-4">
                        <input type="submit" value="Update" class="btn btn-success border border-slate-300 bg-emerald-500/80 px-3 py-2 rounded-xl hover:bg-emerald-400/80">
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>