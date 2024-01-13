<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>
 
<?php
// upload file xls
$target = basename($_FILES['masterpo']['name']) ;
move_uploaded_file($_FILES['masterpo']['tmp_name'], $target);
 
// beri permisi agar file xls dapat di baca
chmod($_FILES['masterpo']['name'],0777);
 
// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['masterpo']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);
 
// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$district_code     = $data->val($i, 1);
	$po_number   = $data->val($i, 2);
	$po_item  = $data->val($i, 3);
    $po_type  = $data->val($i, 4);
    $creation_date = $data->val($i, 5);
    $authorise_status = $data->val($i, 6);
    $remarks = $data->val($i, 7);
    $ro_pr_no = $data->val($i, 8);
    $ro_pr_required_date = $data->val($i, 9);
    $ro_pr_approved_date = $data->val($i, 10);
    $creator_ro_pr = $data->val($i, 11);
    $last_pr_approver = $data->val($i, 12);
    $order_date = $data->val($i, 13);
    $part_no = $data->val($i, 14);
    $manufacturer = $data->val($i, 15);
    $description = $data->val($i, 16);
    $ir_pr_priority = $data->val($i, 17);
    $po_expedite_code = $data->val($i, 18);
    $qty_order = $data->val($i, 19);
    $qty_received_offsite = $data->val($i, 20);
    $qty_received_onsite = $data->val($i, 21);
    $qty_open = $data->val($i, 22);
    $uoi = $data->val($i, 23);
    $uop = $data->val($i, 24);
    $conversion_factor = $data->val($i, 25);
    $unit_cost = $data->val($i, 26);
    $amount = $data->val($i, 27);
    $receiving_amount_offsite = $data->val($i, 28);
    $receiving_amount_onsite = $data->val($i, 29);
    $curr = $data->val($i, 30);
    $foreign_unit_cost = $data->val($i, 31);
    $foreign_amount = $data->val($i, 32);
    $supplier_no = $data->val($i, 33);
    $supplier_name = $data->val($i, 34);
    $po_creator = $data->val($i, 35);
    $purchasing_teams = $data->val($i, 36);
    $last_po_approver = $data->val($i, 37);
    $approver_waiting = $data->val($i, 38);
    $po_approved_date = $data->val($i, 39);
    $promised_delivery_date = $data->val($i, 40);
    $po_promise_date_after_adv_invoice_paid = $data->val($i, 41);
    $update_delivery_date = $data->val($i, 42);
    $po_eta = $data->val($i, 43);
    $po_payment_terms = $data->val($i, 44);
    $po_paid_date = $data->val($i, 45);
    $all_narative_text = $data->val($i, 46);
    $hs_code = $data->val($i, 47);
    $hs_tariff = $data->val($i, 48);
    $delivery_location = $data->val($i, 49);
    $country_code = $data->val($i, 50);
    $freight_code = $data->val($i, 51);
    $value_approved = $data->val($i, 52);
    $value_to_come = $data->val($i, 53);
    $value_to_paid = $data->val($i, 54);
    $aju_number = $data->val($i, 55);
    $waybill_number = $data->val($i, 56);
    $comercial_invoice_number = $data->val($i, 57);
    $receipt_date_offsite = $data->val($i, 58);
    $receipt_date_onsite = $data->val($i, 59);
    $wo_type = $data->val($i, 60);
    $component_code = $data->val($i, 61);
    $maintenance_type = $data->val($i, 62);
    $wo_no = $data->val($i, 63);
    $account_no = $data->val($i, 64);
    $wo_status = $data->val($i, 65);
    $equipment_no = $data->val($i, 66);
    $reff_old_po = $data->val($i, 67);


 
	if($district_code != ""
	&& $po_number != ""
	&& $po_item  != ""
    && $po_type  != ""
    && $creation_date != ""
    && $authorise_status != ""
    && $remarks != ""
    && $ro_pr_no != ""
    && $ro_pr_required_date != ""
    && $ro_pr_approved_date != ""
    && $creator_ro_pr != ""
    && $last_pr_approver != ""
    && $order_date != ""
    && $part_no != ""
    && $manufacturer != ""
    && $description != ""
    && $ir_pr_priority != ""
    && $po_expedite_code != ""
    && $qty_order != ""
    && $qty_received_offsite != ""
    && $qty_received_onsite != ""
    && $qty_open != ""
    && $uoi != ""
    && $uop != ""
    && $conversion_factor != ""
    && $unit_cost != ""
    && $amount != ""
    && $receiving_amount_offsite != ""
    && $receiving_amount_onsite != ""
    && $curr != ""
    && $foreign_unit_cost != ""
    && $foreign_amount != ""
    && $supplier_no != ""
    && $supplier_name != ""
    && $po_creator != ""
    && $purchasing_teams != ""
    && $last_po_approver != ""
    && $approver_waiting != ""
    && $po_approved_date != ""
    && $promised_delivery_date != ""
    && $po_promise_date_after_adv_invoice_paid != ""
    && $update_delivery_date != ""
    && $po_eta != ""
    && $po_payment_terms != ""
    && $po_paid_date != ""
    && $all_narative_text != ""
    && $hs_code != ""
    && $hs_tariff != ""
    && $delivery_location != ""
    && $country_code != ""
    && $freight_code != ""
    && $value_approved != ""
    && $value_to_come != ""
    && $value_to_paid != ""
    && $aju_number != ""
    && $waybill_number != ""
    && $comercial_invoice_number != ""
    && $receipt_date_offsite != ""
    && $receipt_date_onsite != ""
    && $wo_type != ""
    && $component_code != ""
    && $maintenance_type != ""
    && $wo_no != ""
    && $account_no != ""
    && $wo_status != ""
    && $equipment_no != ""
    && $reff_old_po != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($kon,"INSERT into master_po values('','$district_code',
        '$po_number',
	 '$po_item',
     '$po_type',
     '$creation_date',
     '$authorise_status',
     '$remarks',
     '$ro_pr_no',
     '$ro_pr_required_date',
     '$ro_pr_approved_date',
     '$creator_ro_pr',
     '$last_pr_approver',
     '$order_date',
     '$part_no',
     '$manufacturer',
     '$description',
     '$ir_pr_priority',
     '$po_expedite_code',
     '$qty_order',
     '$qty_received_offsite',
     '$qty_received_onsite',
     '$qty_open',
     '$uoi',
     '$uop',
     '$conversion_factor',
     '$unit_cost',
     '$amount',
     '$receiving_amount_offsite',
     '$receiving_amount_onsite ',
     '$curr',
     '$foreign_unit_cost',
     '$foreign_amount',
     '$supplier_no',
     '$supplier_name',
     '$po_creator',
     '$purchasing_teams',
     '$last_po_approver',
     '$approver_waiting',
     '$po_approved_date',
     '$promised_delivery_date',
     '$po_promise_date_after_adv_invoice_paid',
     '$update_delivery_date',
     '$po_eta',
     '$po_payment_terms',
     '$po_paid_date',
     '$all_narative_text',
     '$hs_code',
     '$hs_tariff',
     '$delivery_location',
     '$country_code',
     '$freight_code',
     '$value_approved',
     '$value_to_come',
     '$value_to_paid',
     '$aju_number',
     '$waybill_number',
     '$comercial_invoice_number',
     '$receipt_date_offsite',
     '$receipt_date_onsite',
     '$wo_type',
     '$component_code',
     '$maintenance_type',
     '$wo_no',
     '$account_no',
     '$wo_status',
     '$equipment_no',
     '$reff_old_po')");
		$berhasil++;
	}
}
 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['masterpo']['name']);
 
// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>