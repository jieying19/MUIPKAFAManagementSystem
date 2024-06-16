<x-app-layout>
    <div class="w-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            Payment via Card Details
        </div>
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3">
            <form action="{{ route('insertWalletForm') }}" method="post">
                @csrf
                @method('post')
                <table class="rounded-xl px-4 w-3/4">
                <tbody >
                        <tr>
                            <td class="px-4 py-2"><label>E-Wallet Bank</label></td>
                            <td class="px-4 py-2 w-3/4"><input type="text" name="walletBank" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2"><label>E-Wallet Account Number</label></td>
                            <td class="px-4 py-2"><input type="number" name="walletAcc" class="form-control rounded-xl w-2/5 bg-gray-200 border border-slate-400"></td>
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