<table>
    <thead>
        <tr>
            <th colspan="14"></th>
        </tr>
        <tr>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:aqua">
                No</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Nama Outlet</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Kode Invoice</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Nama Member</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Tanggal Transaksi</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Batas Waktu</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Tanggal Bayar</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Biaya Tambahan</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Diskon</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Pajak</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Total</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Status</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
                Pembayaran</th>
            <th
                style="font-family: calibri; font-size: 12px; text-align: center; border: 1px solid black; background-color:  aqua;">
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
