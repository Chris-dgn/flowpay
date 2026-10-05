<?php

namespace App\Http\Controllers;

use App\Models\FlowPayTestTransfer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TransferController extends Controller
{
    public function create(Request $request): View
    {
        /*
         * Si l'administrateur a défini un niveau de chargement,
         * on utilise toujours cette valeur.
         *
         * Si aucun niveau n'a encore été défini,
         * le niveau par défaut reste 58 %.
         */
        $loadingLevel = $request->user()->loading_level ?? 58;

        return view('transfers.create', compact('loadingLevel'));
    }

    public function loadingLevel(Request $request): JsonResponse
{
    return response()->json([
        'loading_level' => $request->user()->loading_level ?? 58,
    ]);
}

    public function verification(Request $request): View
    {
        $transferId = $request->session()->get('flowpay_transfer_id');

        $transfer = FlowPayTestTransfer::query()
            ->where('id', $transferId)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        return view('transfers.verification', compact('transfer'));
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'beneficiary' => ['required', 'string', 'max:255'],
            'account' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string', 'max:255'],
            'bic_swift' => ['required', 'string', 'max:11'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'reason' => ['required', 'string', 'max:255'],
        ]);

        $testCode = (string) random_int(10000, 99999);

        $transfer = FlowPayTestTransfer::create([
            'user_id' => $request->user()->id,
            'beneficiary' => $validated['beneficiary'],
            'account' => $validated['account'],
            'bank_name' => $validated['bank_name'],
            'bic_swift' => $validated['bic_swift'],
            'amount' => $validated['amount'],
            'reason' => $validated['reason'],
            'test_code' => $testCode,
            'status' => 'verification_pending',
        ]);

        $request->session()->put('flowpay_transfer_id', $transfer->id);

        return response()->json([
            'transfer_id' => $transfer->id,
            'test_code' => $transfer->test_code,
        ]);
    }

    public function verify(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'test_code' => ['required', 'digits:5'],
        ]);

        $transferId = $request->session()->get('flowpay_transfer_id');

        $transfer = FlowPayTestTransfer::query()
            ->where('id', $transferId)
            ->where('user_id', $request->user()->id)
            ->firstOrFail();

        if ($transfer->status !== 'verification_pending') {
            return response()->json([
                'message' => 'Cette simulation a déjà été traitée.',
            ], 422);
        }

        if ($validated['test_code'] !== $transfer->test_code) {
            return response()->json([
                'message' => 'Code TEST FlowPay incorrect ou expiré.',
            ], 422);
        }

        $transfer->update([
            'status' => 'verified',
        ]);

        $request->session()->forget('flowpay_transfer_id');

        return response()->json([
            'message' => 'Vérification effectuée avec succès. Veuillez réessayer le paiement.',
            'status' => 'verified',
            'redirect' => route('transfers.success'),
        ]);
    }
}