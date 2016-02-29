/**
 * JavaScript custom yang dibutuhkan dijadikan satu dalam file ini
 */
function konfirmasi_mahasiswa(id) {
	var ctn = confirm("Konfirmasi mahasiswa ini?");
	if (!ctn) return false;
	$.post(Globals.site_url+"/control_administrasi/konfirmasi_mahasiswa/",
		{
			nim: id
		},
		function(data,status){
			if(data === "ok"){
				location.reload(true);
			}else{
				alert(data);
			}
		});
	return false;
}

function daftarkan_mahasiswa(id) {
	if(typeof(id)==='undefined') id = "semua";
	var ctn = confirm("Cetak Data Mahasiswa?");
	if (!ctn) return false;
	$.post(Globals.site_url+"/control_administrasi/daftarkan_mahasiswa/",
		{
			nim: id
		},
		function(data, status, xhr){
			if(data === "ok"){
				$("body").append("<iframe src='"+Globals.site_url+"/control_administrasi/cetak_email/' style='display: none;'></iframe>");
				setTimeout(function(){
					location.reload(true);
				}, 2000);
			}else{
				alert(data);
			}
		});
	return false;
}

function hapus_mahasiswa(id) {
	var ctn = confirm("Hapus mahasiswa ini?");
	if (!ctn) return false;
	$.post(Globals.site_url+"/control_administrasi/hapus_mahasiswa",
		{
			nim: id
		},
		function(data,status){
			if(data === "ok"){
				alert("Data berhasil dihapus.");
				location.reload(true);
			}else{
				alert(data);
			}
		});
	return false;
}

$(document).ready(function(){
	if(Globals.activePage != null){
		var activePage = Globals.activePage;
		var spanNode = document.createElement("SPAN");
		var spanText = document.createTextNode("(current)");
		spanNode.className = "sr-only";
		spanNode.appendChild(spanText);
		
		document.getElementById(activePage).className = "active";
		document.getElementById(activePage).firstChild.appendChild(spanNode);
		
		$('#tableMahasiswa').DataTable({
			language: {
				"search": "Cari:",
				"emptyTable":     "Tidak ada data pada tabel",
				"infoEmpty":      "Menampilkan 0 mahasiswa",
				"info":           "Menampilkan _START_ - _END_ dari _TOTAL_ mahasiswa",
				"infoFiltered":   "(Disortir dari _MAX_ total mahasiswa)",
				"lengthMenu":     "Menampilkan _MENU_ mahasiswa",
				"loadingRecords": "Memuat...",
				"processing":     "Memproses...",
				"zeroRecords":    "Pencarian tidak ditemukan",
				"paginate": {
					"first":      "Pertama",
					"last":       "Terakhir",
					"next":       "Selanjutnya",
					"previous":   "Sebelumnya"
				},
				"aria": {
					"sortAscending":  ": Mensortir kolom secara ascending",
					"sortDescending": ": Mensortir kolom secara descending"
				}
			}
		});
	}
});
