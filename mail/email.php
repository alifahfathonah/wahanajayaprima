<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\models\Rma;

/* @var $this yii\web\View */
/* @var $model app\models\Rma */


?>

Dear Bpk/Ibu <?= $model->customer;?>,

<p>Berikut adalah status pengerjaan RMA Anda : </p>	

<table>	
	<tr>
		<td><?php echo $model->getAttributeLabel('rma_no'); ?></td>
		<td>:</td>
		<td><?php echo $model->rma_no;?></td>
		<td width="30%"></td>
		<td><?php echo $model->getAttributeLabel('rma_date'); ?></td>
		<td>:</td>
		<td><?php echo date('d-M-Y', strtotime($model->rma_date));?></td>
	</tr>
	
	<tr>
		<td><?php echo $model->getAttributeLabel('customer'); ?></td>
		<td>:</td>
		<td><?php echo $model->customer;?></td>
		<td></td>
		<td><?php echo $model->getAttributeLabel('telp'); ?></td>
		<td>:</td>
		<td><?php echo $model->telp;?></td>
	</tr>
	<tr>
		<td><?php echo $model->getAttributeLabel('barang'); ?></td>
		<td>:</td>
		<td><?php echo $model->barang;?></td>
		<td width="30%"></td>
		<td><?php echo $model->getAttributeLabel('jumlah'); ?></td>
		<td>:</td>
		<td><?php echo number_format($model->jumlah);?></td>
	</tr>

	<tr>
		<td><?php echo $model->getAttributeLabel('keluhan'); ?></td>
		<td>:</td>
		<td><?php echo $model->keluhan;?></td>
	</tr>	

	<tr>
		<td><?php echo $model->getAttributeLabel('keterangan'); ?></td>
		<td>:</td>
		<td><?php echo $model->keterangan;?></td>
		<td width="30%"></td>
		<td><?php echo $model->getAttributeLabel('status'); ?></td>
		<td>:</td>
		<td><?php echo $model->status;?></td>
	</tr>
</table>

<p>Untuk pengecekkan status secara online silakan klik <a href="<?= Yii::$app->params['urlRMA'];?>">disini</a>
<p style="font-size:small;font-style:italic;">Mohon jangan mereply email ini. Email ini digenerate oleh sistem</p>	

<p style="font-size:small;font-style:italic;">
Berikut adalah informasi ketentuan garansi yang harus di pahami dan setujui pelanggan jika pelanggan bermaksud melakukan proses klaim garansi melalui Enter.ID
1. Garansi berlaku jika unit barang yang di klaim masih dalam masa garansi saat kami menerima barang tersebut, tidak mengalami cacat fisik, atau kerusakan lain yang diakibatkan oleh terbakar, bencana alam, huru-hara ataupun kelalaian penggunaan baik disengaja maupun tidak yang menyebabkan garansi void / tidak berlaku. 2. Kami akan memprioritaskan garansi unit barang yang mengalami kerusakan dalam jangka waktu kurang dari 1 minggu (7 hari) dari tanggal pembelian agar dapat dilakukan replacement unit, namun jika unit barang mengalami cacat fisik seperti tergores / lecet maupun kelengkapan unit tidak lengkap maka proses klaim garansi tetap mengikuti standard prosedur klaim garansi. 3. Mohon dilakukan pengecekan lebih lanjut atas unit barang yang akan di klaim untuk menghindari barang yang di klaim sebenarnya tidak mengalami kerusakan. anda dapat berkonsultasi dengan tim teknis kami via telp di 021-3000-5529. 4. Biaya kirim yang timbul atas proses klaim garansi dari Pelanggan ke Enter.ID maupun pengiriman kembali barang dari Enter.ID ke Pelanggan dibebankan kepada pihak pelanggan. 5. Enter.ID akan memberikan kebijakan free biaya kirim kembali jika barang yang di klaim garansi dan memang mengalami kerusakan setelah kami cek lebih lanjut jika unit barang tersebut kami terima maksimal 7 (tujuh) hari dari tanggal pembelian barang. free biaya kirim hanya berlaku untuk pengiriman kembali, tidak untuk pengiriman dari pelanggan ke Enter.ID. 6. Dalam mengirimkan barang untuk di klaim, mohon untuk mengisi form garansi (klik disini) dan kemudian di cetak (print) dan disertakan bersama copy nota dan unit barang yang akan di klaim. Enter.ID berhak menolak klaim garansi yang tidak menyertakan informasi nota pembelian. 7. Follow-up klaim garansi dapat menyebutkan informasi Nomor Klaim Garansi yang anda dapatkan saat mengisi form klaim garansi, atau dapat juga menyebutkan nomor telp yang anda informasikan saat melakukan klaim garansi. 8. Enter.ID akan selalu menginformasikan update status mengenai proses klaim anda melalui email yang terdaftar. pastikan anda memasukan alamat email dengan benar. 9. Unit barang yang ditolak proses klaim garansi oleh pihak service center / distributor karena void, atau kurangnya kelengkapan barang akan kami informasikan kepada pelanggan untuk dikirimkan kembali. 10. Beberapa unit barang yang void garansi dan bisa di bantu service oleh pihak service center / distributor dapat menimbulkan biaya perbaikan, kami akan menginformasikan biaya tersebut kepada pelanggan dan jika pelanggan setuju maka proses service akan di proses lebih lanjut. 11. Unit barang yang sudah tidak di produksi lagi (End of Life) namun masih dalam cakupan masa garansi, jika stock replacement sudah tidak tersedia, maka dari pihak service center / distributor akan menyarankan untuk opsi Upgrade dengan type baru yang tersedia dan dapat menimbulkan biaya upgrade. Informasi biaya upgrade akan kami informasikan kembali kepada pelanggan sebelum diproses penggantian / upgrade. 12. Unit barang yang telah selesai di proses klaim garansi dan siap diambil/dikirim akan kami informasikan secara berkala via email kepada pelanggan. Mohon agar segera melakukan pengambilan / proses pengiriman barangnya. Unit barang yang telah selesai di proses klaim garansi namun tidak ada konfirmasi pengambilan atau pengiriman dalam jangka waktu lebih dari 3 (tiga) bulan sejak barang tersebut selesai di proses 13. klaim, maka pihak Enter.ID tidak bisa menjamin kembali unit tersebut masih berfungsi normal karena kerusakan dapat terjadi kembali dalam selang waktu proses penyimpanan. 14. Unit barang yang telah selesai di proses klaim garansi namun tidak ada konfirmasi pengambilan atau pengiriman dalam jangka waktu lebih dari 6 (enam) bulan sejak barang tersebut selesai di proses klaim, maka pihak Enter.ID tidak lagi bertanggung jawab atas keberadaan barang tersebut karena terbatasnya penyimpanan barang dan resiko yang timbul atas penitipan barang yang terlalu lama. 15. Bantuan dan informasi lebih lanjut mengenai proses klaim garansi dapat menghubungi tim warranty kami via telp ke 021-3000-5529 atau email ke rma.enterkomputer@gmail.com

</p>
