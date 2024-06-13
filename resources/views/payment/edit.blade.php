<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            Edit User Payment Details
        </div>
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <form action="{{route('payment.update', $paymentDetails->id)}}" method="post">
                @csrf
                @method('post')
                <table class="rounded-xl px-4 w-3/6">
                    <tbody >
                        <tr>
                            <td class="px-4 py-2"><label>User Name</label></td>
                            <td class="px-4 py-2"><input type="text" name="name" value="{{ $paymentDetails->userName }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" required></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Amount Owed</label></td>
                            <td class="px-4 py-2"><input type="text" name="owed" value="{{ $paymentDetails->amountOwed }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" required></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Amount Payed</label></td>
                            <td class="px-4 py-2"><input type="number" name="payed" value="{{ $paymentDetails->amountPayed }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" step=".01" required></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Payment Method</label></td>
                            <td class="px-4 py-2"><input type="text" name="methodpay" value="{{ $paymentDetails->paymentMethod }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" step=".01" required></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>Last Payment</label></td>
                            <td class="px-4 py-2"><input type="date" name="lastpay" value="{{ $paymentDetails->lastPayment }}" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400" required></td>
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