<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AdminController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.investors');
    }

    public function investors(Request $request)
    {
        $query = Investor::with('user')->latest();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('tier', 'like', "%{$search}%")
                  ->orWhere('investor_type', 'like', "%{$search}%")
                  ->orWhere('reference_number', 'like', "%{$search}%")
                  ->orWhereHas('user', fn($uq) => $uq->where('email', 'like', "%{$search}%"));
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        if ($tier = $request->input('tier')) {
            $query->where('tier', $tier);
        }

        $investors = $query->paginate(20)->withQueryString();

        $stats = [
            'total'    => Investor::count(),
            'pending'  => Investor::where('status', 'pending')->count(),
            'approved' => Investor::where('status', 'approved')->count(),
            'active'   => Investor::where('status', 'active')->count(),
        ];

        return view('admin.investors.index', compact('investors', 'stats'));
    }

    public function show(Investor $investor)
    {
        $investor->load('user');
        return view('admin.investors.show', compact('investor'));
    }

    public function updateStatus(Request $request, Investor $investor)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,active,suspended,completed',
        ]);

        $investor->update(['status' => $request->status]);

        return back()->with('success', "Status updated to \"{$request->status}\" for {$investor->full_name}.");
    }

    public function exportCsv()
    {
        $investors = Investor::with('user')->orderBy('created_at')->get();

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="Mambilla_Investors_' . now()->format('Y-m-d') . '.csv"',
        ];

        $columns = [
            'Reference', 'Full Name', 'Email', 'Phone', 'Alt Phone',
            'Date of Birth', 'BVN / RC No.', 'Tax ID', 'Investor Type',
            'Tier', 'Custom Amount', 'Payment Method', 'Status',
            'Address', 'City/State', 'Country', 'Communication',
            'Notes', 'Registered At',
        ];

        $callback = function () use ($investors, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($investors as $inv) {
                fputcsv($file, [
                    $inv->reference_number,
                    $inv->full_name,
                    $inv->user->email ?? '',
                    $inv->phone_primary,
                    $inv->phone_alternate,
                    $inv->date_of_birth?->format('Y-m-d'),
                    $inv->bvn_rc_number,
                    $inv->tax_id,
                    $inv->investor_type,
                    $inv->tier,
                    $inv->custom_amount,
                    $inv->payment_method,
                    $inv->status,
                    $inv->address,
                    $inv->city_state,
                    $inv->country,
                    $inv->communication_prefs,
                    $inv->notes,
                    $inv->created_at->format('Y-m-d H:i'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportExcel()
    {
        $investors = Investor::with('user')->orderBy('created_at')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Investor Registrations');

        $headers = [
            'Reference', 'Full Name', 'Email', 'Phone', 'Alt Phone',
            'Date of Birth', 'BVN / RC No.', 'Tax ID', 'Investor Type',
            'Tier', 'Custom Amount', 'Payment Method', 'Status',
            'Address', 'City/State', 'Country', 'Communication',
            'Notes', 'Registered At',
        ];

        // Header row styling
        $sheet->fromArray([$headers], null, 'A1');
        $headerStyle = [
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => 'D81B7A']],
        ];
        $sheet->getStyle('A1:S1')->applyFromArray($headerStyle);

        // Data rows
        $row = 2;
        foreach ($investors as $inv) {
            $sheet->fromArray([[
                $inv->reference_number,
                $inv->full_name,
                $inv->user->email ?? '',
                $inv->phone_primary,
                $inv->phone_alternate,
                $inv->date_of_birth?->format('Y-m-d'),
                $inv->bvn_rc_number,
                $inv->tax_id,
                $inv->investor_type,
                $inv->tier,
                $inv->custom_amount,
                $inv->payment_method,
                $inv->status,
                $inv->address,
                $inv->city_state,
                $inv->country,
                $inv->communication_prefs,
                $inv->notes,
                $inv->created_at->format('Y-m-d H:i'),
            ]], null, 'A' . $row++);
        }

        // Auto-width columns
        foreach (range('A', 'S') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer   = new Xlsx($spreadsheet);
        $filename = 'Mambilla_Investors_' . now()->format('Y-m-d') . '.xlsx';
        $tmpPath  = sys_get_temp_dir() . '/' . $filename;
        $writer->save($tmpPath);

        return response()->download($tmpPath, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }
}
