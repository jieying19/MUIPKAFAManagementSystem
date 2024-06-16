<?php

namespace Database\Seeders;

use App\Models\managePaymentModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        managePaymentModel::create([
            'cardBank' => "Maybank",
            'cardNum' => "0123456789",
            'cardCVV' => 123,
            'cardExpirationDate' => Carbon::create(2025, 12, 31), // Set to December 31, 2025
            'cardholderName' => "Wan",
            'cardholderState' => "Sabah",
            'cardholderCity' => "Kota Kinabalu",
            'cardholderPostalCode' => 88200,
            'eWalletbank' => null,
            'eWalletAccNum' => null,
            'parent_id' => "PA123",
            'payment_method' => "Card",
            'payment_owed' => 500,
            'payment_made' => 100,
            'payment_status' => "",
            'payment_date' => now(),
        ]);

        managePaymentModel::create([
            'cardBank' => "RHB",
            'cardNum' => "0123456789",
            'cardCVV' => 123,
            'cardExpirationDate' => Carbon::create(2025, 12, 31), // Set to December 31, 2025
            'cardholderName' => "Abdul",
            'cardholderState' => "Kedah",
            'cardholderCity' => "Alor Setar",
            'cardholderPostalCode' => 05000,
            'eWalletbank' => null,
            'eWalletAccNum' => null,
            'parent_id' => "PA124",
            'payment_method' => "Card",
            'payment_owed' => 500,
            'payment_made' => 500,
            'payment_status' => "",
            'payment_date' => now(),
        ]);

        managePaymentModel::create([
            'cardBank' => "RHB",
            'cardNum' => "0123456789",
            'cardCVV' => 123,
            'cardExpirationDate' => Carbon::create(2025, 12, 31), // Set to December 31, 2025
            'cardholderName' => "Syahmi",
            'cardholderState' => "Sarawak",
            'cardholderCity' => "Kuching",
            'cardholderPostalCode' => 93000,
            'eWalletbank' => null,
            'eWalletAccNum' => null,
            'parent_id' => "PA125",
            'payment_method' => "Card",
            'payment_owed' => 500,
            'payment_made' => 0,
            'payment_status' => "",
            'payment_date' => now(),
        ]);
    }
}
