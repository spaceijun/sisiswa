<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - Print</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            font-size: 12px;
            line-height: 1.4;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .header h2 {
            margin: 5px 0 0 0;
            font-size: 14px;
            font-weight: normal;
        }

        .print-info {
            text-align: right;
            margin-bottom: 20px;
            font-size: 10px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #333;
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
        }

        table th {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
            font-style: italic;
        }

        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10px;
            color: #666;
        }

        /* Print Button Styles */
        .print-button {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            z-index: 1000;
            font-size: 14px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .print-button:hover {
            background-color: #0056b3;
        }

        @media print {
            body {
                margin: 0;
                font-size: 11px;
            }

            .header {
                margin-bottom: 20px;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            .print-info,
            .footer {
                font-size: 9px;
            }

            .print-button {
                display: none !important;
            }
        }

        @page {
            margin: 1cm;
            size: A4;
        }
    </style>
</head>

<body>
    <!-- Print Button -->
    <button class="print-button" onclick="printDocument()">
        <i class="fas fa-print"></i> Print Dokumen
    </button>

    <div class="header">
        <h1>DATA SISWA</h1>
        <h2>Sistem Informasi Sekolah</h2>
    </div>

    <div class="print-info">
        Dicetak pada: <?php echo date('d/m/Y H:i:s'); ?>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="12%">Kelas</th>
                <th width="20%">Nama Siswa</th>
                <th width="12%">NIS</th>
                <th width="12%">Jenis Kelamin</th>
                <th width="15%">Telephone</th>
                <th width="12%">Tahun Ajaran</th>
                <th width="12%">Penilaian</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $index => $siswa)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $siswa->kela->nama_kelas ?? '-' }}</td>
                    <td>{{ $siswa->nama_siswa }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>{{ $siswa->telephone }}</td>
                    <td>{{ $siswa->tahun_ajaran }}</td>
                    <td>{{ $siswa->penilaian }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="no-data">
                        Tidak ada data siswa yang tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Total Siswa: {{ count($siswas) }} orang
    </div>

    <script>
        function printDocument() {
            // Fungsi print yang lebih reliable
            try {
                window.print();
            } catch (e) {
                alert('Print gagal. Silakan gunakan Ctrl+P untuk mencetak.');
            }
        }

        // Auto print dengan delay untuk memastikan halaman fully loaded
        window.addEventListener('load', function() {
            // Berikan delay 500ms untuk memastikan semua resource loaded
            setTimeout(function() {
                // Hanya auto print jika ada parameter autoprint di URL
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.get('autoprint') === 'true') {
                    printDocument();
                }
            }, 500);
        });

        // Keyboard shortcut
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'p') {
                e.preventDefault();
                printDocument();
            }
        });
    </script>
</body>

</html>
