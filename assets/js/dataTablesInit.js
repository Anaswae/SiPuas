/**
 * 
 */
function hapus_kuisioner(id) {
	var ctn = confirm("Anda Yakin Akan Menghapus Kuisioner Nomer " + id + " ?");
	if (!ctn) return false;
	$.post(Globals.site_url+"ajax/delete_kuisioner",
		{
			nomer: id
		},
		function(data,status){
			if(data === "ok"){
				alert("Kuisioner berhasil dihapus.");
				location.reload(true);
			}else{
				alert(data);
			}
		});
	return false;
}

$(document).ready(function(){
	$('#dataTables-list').DataTable({
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
		},
		responsive:true,
		scrollX:true
	});
    
});