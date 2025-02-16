<table>
    <thead>
        <tr>
            <th colspan="14"></th>
        </tr>
        <tr>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color: rgb(0, 187, 255);">
                No</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Nama Outlet</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Kode Invoice</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Nama Member</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Tanggal Transaksi</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Batas Waktu</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Tanggal Bayar</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Biaya Tambahan</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Diskon</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Pajak</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Total</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Status</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Pembayaran</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  rgb(0, 187, 255);">
                Nama Petugas</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($data as $item)
            <tr>
                <td style="border: 1px solid black;">{{ $no++ }}</td>
                <td style="border: 1px solid black;">{{ $item->outlet->nama }}</td>
                <td style="border: 1px solid black;">{{ $item->kode_invoice }}</td>
                <td style="border: 1px solid black;">{{ $item->member->nama }}</td>
                <td style="border: 1px solid black;">{{ $item->tgl }}</td>
                <td style="border: 1px solid black;">{{ $item->batas_waktu}}</td>
                <td style="border: 1px solid black;">{{ $item->tgl_bayar }}</td>
                <td style="border: 1px solid black;">Rp. {{ $item->biaya_tambahan }}</td>
                <td style="border: 1px solid black;">Rp. {{ $item->diskon }}</td>
                <td style="border: 1px solid black;">Rp. {{ $item->pajak }}</td>
                <td style="border: 1px solid black;">Rp. {{ $item->total}}</td>
                <td style="border: 1px solid black;">{{ $item->status }}</td>
                <td style="border: 1px solid black;">{{ $item->dibayar }}</td>
                <td style="border: 1px solid black;">{{ $item->user->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
