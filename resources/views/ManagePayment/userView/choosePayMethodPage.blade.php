<x-app-layout>
    <div class="flex flex-col justify-evenly gap-y-3 h-full">
        {{-- Title --}}
        <div class="font-extrabold text-xl mt-2">
            View Bill
        </div>

        <div class="flex justify-end w-full mb-5 relative right-0">
            <a href="{{ route('debitCreditCardFormPage') }}"
                class="p-3 mx-3 border border-transparent rounded-xl hover:text-gray-600"
                style="background-color: #00AEA6;">
                New Card Payment
            </a>
            <a href="{{ route('EWalletFormPage') }}"
                class="p-3 mx-3 border border-transparent rounded-xl hover:text-gray-600"
                style="background-color: #00AEA6;">
                New E-Wallet Payment
            </a>
        </div>

        {{-- Content --}}
        <div class="bg-white border border-slate-300 rounded-xl w-full p-3" style="min-height: 83.333333%; max-height:  83.333333%;">
            <div class="font-bold text-lg">
                    List of Payments Made
            </div>

            {{-- Message --}}
            @if (session('success'))
                <div class="mt-3 bg-green-200 text-green-800 px-4 py-2 mb-4 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mt-3 bg-red-200 text-red-800 px-4 py-2 mb-4 rounded-md">
                    {{ session('error') }}
                </div>
            @endif
        
            {{-- Table --}}
            <div class="mt-5">
                <div class="mx-2 overflow-y-auto" style="max-height: 30rem;">
                    <table class="min-w-full table-auto">
                        <thead class="sticky top-0 bg-white">
                            <tr>
                                <th class="text-left py-2 px-2">Parent ID</th>
                                <th class="text-left py-2 px-2">Payment Method</th>
                                <th class="text-left py-2 px-2">Payment Owed</th>
                                <th class="text-left py-2 px-2">Payment Made</th>
                                <th class="text-left py-2 px-2">Payment Status</th>
                                <th class="text-left py-2 px-2">Payment Date</th>
                                <th class="text-left py-2 px-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $payment)
                            <tr class="border-t border-slate-400 bg-gray-100">
                                <td class="py-2 px-2">{{ $payment->parent_id }}</td>
                                <td class="py-2 px-2">{{ $payment->payment_method }}</td>
                                <td class="py-2 px-2">500</td> {{--Owed must always be RM500--}}
                                <td class="py-2 px-2">{{ $payment->payment_made }}</td>
                                <td class="py-2 px-2">{{ $payment->payment_status }}</td>
                                <td class="py-2 px-2">{{ $payment->payment_date }}</td>
                                <td class="py-2 px-2">
                                    <div class="flex space-x-4">
                                        <!-- Modal content -->
                                        <div id="myModal{{ $payment->id }}" class="modal">
                                            <div class="modal-content">
                                                <span class="close" data-id="{{ $payment->id }}">&times;</span>
                                                <h1>Card Number</h1>
                                                <p>{{ $payment->cardNum }}</p>
                                                <h1>Card Bank Name</h1>
                                                <p>{{ $payment->cardBank }}</p>
                                                <h1>Card Expiration Date</h1>
                                                <p>{{ $payment->cardExpirationDate }}</p>
                                                <h1>Card Holder Name</h1>
                                                <p>{{ $payment->cardholderName }}</p>
                                                <h1>Card Holder State</h1>
                                                <p>{{ $payment->cardholderState }}</p>
                                                <h1>Card Holder City</h1>
                                                <p>{{ $payment->cardholderCity }}</p>
                                                <h1>Card Holder Postal Code</h1>
                                                <p>{{ $payment->cardholderPostalCode }}</p>
                                                <h1>E-Wallet Bank Name</h1>
                                                <p>{{ $payment->eWalletbank }}</p>
                                                <h1>E-Wallet Account Number</h1>
                                                <p>{{ $payment->eWalletAccNum }}</p>
                                            </div>
                                        </div>
                                        
                                        <!-- This button displays the modal -->
                                        <button id="myBtn{{ $payment->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-400 m-2"
                                                fill="none" viewBox="0 0 24 24" stroke="grey" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{--Below is css and js for the modal pop-up effect--}}   

<style type="text/css">
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

.modal h1{
    font-weight: bold;
    color: #e5e7eb;
}

.modal p{
    margin-bottom: 20px;
    color: #e5e7eb;
}

/* Modal Content/Box */
.modal-content {
  background-color: #0c1446;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 20%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #00aea6;
  text-decoration: none;
  cursor: pointer;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get all the buttons and modals
    var buttons = document.querySelectorAll('[id^="myBtn"]');
    var modals = document.querySelectorAll('[id^="myModal"]');
    var spans = document.querySelectorAll('.close');

    // Add event listeners to each button
    buttons.forEach(function(button) {
        button.onclick = function() {
            var modalId = this.id.replace('myBtn', 'myModal');
            var modal = document.getElementById(modalId);
            modal.style.display = "block";
        }
    });

    // Add event listeners to each close span
    spans.forEach(function(span) {
        span.onclick = function() {
            var modalId = 'myModal' + this.getAttribute('data-id');
            var modal = document.getElementById(modalId);
            modal.style.display = "none";
        }
    });

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        modals.forEach(function(modal) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
});
</script>
</x-app-layout>