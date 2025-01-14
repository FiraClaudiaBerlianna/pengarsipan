<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Surat Masuk</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../backend/css/app.css" />
    <!-- Tambahkan style tambahan -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: border-color 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #007bff;
            background-color: #ffffff;
        }

        .btn-success {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: rgb(34, 87, 145);
        }

        .btn-primary {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #218838;
        }

        .invalid-feedback {
            font-size: 13px;
            color: red;
            margin-top: 5px;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            /* Menempatkan tombol di sebelah kanan */
            margin-top: 15px;
        }

        .btn-back {
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            margin-bottom: 20px;
            display: block;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Kembali ke sidebar -->
        <a href="{{ route('sidebar') }}" class="btn-back">Kembali</a>

        <h1>Tambah Surat Masuk</h1>
        <form action="{{ route('surat_masuk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control @error('nomor_surat') is-invalid @enderror"
                    value="{{ old('nomor_surat') }}" required>
                @error('nomor_surat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="pengirim">Pengirim</label>
                <input type="text" name="pengirim" class="form-control @error('pengirim') is-invalid @enderror"
                    value="{{ old('pengirim') }}" required>
                @error('pengirim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_terima">Tanggal Terima</label>
                <input type="date" name="tanggal_terima"
                    class="form-control @error('tanggal_terima') is-invalid @enderror"
                    value="{{ old('tanggal_terima') }}" required>
                @error('tanggal_terima')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="4"
                    required>{{ old('isi') }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="file">Upload File (Opsional)</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                @error('file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>


        <!-- Tombol Lihat Data Surat Masuk -->
        <div class="button-container">
            <a href="{{ route('surat_masuk.index') }}" class="btn btn-primary">Lihat Data Surat Masuk</a>
        </div>
    </div>
</body>

</html>