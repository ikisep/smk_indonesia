<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Daftar Nilai</h2>
    <table>
        <thead>
            <tr>
                <th>Kelas</th>
                <th>Absen</th>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Tugas</th>
                <th>Nilai Akhir</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grades as $grade)
                <tr>
                    <td>{{ $grade->student->class ?? '-' }}</td>
                    <td>{{ $grade->student->absen ?? '-' }}</td>
                    <td>{{ $grade->student->name ?? '-' }}</td>
                    <td>{{ $grade->mapel->nama ?? 'Tidak ada mapel' }}</td>
                    <td>{{ $grade->uts }}</td>
                    <td>{{ $grade->uas }}</td>
                    <td>{{ $grade->tugas }}</td>
                    <td>{{ $grade->na }}</td>
                    <td>{{ $grade->grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
