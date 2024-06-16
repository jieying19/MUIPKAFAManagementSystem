<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            Payment via Card Details
        </div>
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <form action="{{ route('insertCardForm') }}" method="post">
                @csrf
                @method('post')
                <table class="rounded-xl px-4 w-3/4">
                <tbody >
                        <tr>
                            <td class="px-4 py-2"><label>Card Bank</label></td>
                            <td class="px-4 py-2 w-3/4"><input type="text" name="cardBank" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Number</label></td>
                            <td class="px-4 py-2"><input type="text" name="cardNum" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card CVV</label></td>
                            <td class="px-4 py-2"><input type="number" name="CVV" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" step=".01"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Expiration Date</label></td>
                            <td class="px-4 py-2"><input type="month" name="expiration" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" step=".01"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder Name</label></td>
                            <td class="px-4 py-2"><input type="text" name="holderName" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder State</label></td>
                            <td class="px-4 py-2"><input type="text" name="holderState" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder City</label></td>
                            <td class="px-4 py-2"><input type="text" name="holderCity" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Card Holder Postal Code</label></td>
                            <td class="px-4 py-2"><input type="number" name="holderPostal" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Parent ID</label></td>
                            <td class="px-4 py-2"><input type="text" name="parentID" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Payment Made</label></td>
                            <td class="px-4 py-2"><input type="number" name="payed" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex justify-end px-4 py-2">
                    <div class="px-4">
                        <input type="reset" value="Clear" class="btn border border-slate-400 bg-gray-400 px-3 py-2 rounded-xl hover:bg-gray-300">
                    </div>
                    <div class="px-4">
                        <input type="submit" value="Create" class="btn btn-success border border-slate-300 bg-emerald-500/80 px-3 py-2 rounded-xl hover:bg-emerald-400/80">
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>