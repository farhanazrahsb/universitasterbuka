				<thead>
					<tr>
						<th>Mahasiswa</th>
						<th>MataKuliah</th>
						<th>Nilai</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$NIM=$_GET['NIM'];
						$querynilai = mysqli_query ($konek, "SELECT * FROM nilai WHERE NIM_Nilai='$NIM'");
						if($querynilai == false){
							die ("Terjadi Kesalahan : ". mysqli_error($konek));
						}
							
						while ($nilai = mysqli_fetch_array ($querynilai)){
							$nama=mysqli_fetch_array(mysqli_query($konek, "SELECT Nama_Mahasiswa FROM mahasiswa WHERE NIM='$nilai[NIM_Nilai]'"));
							$matkul=mysqli_fetch_array(mysqli_query($konek, "SELECT Nama_Matakuliah FROM matakuliah WHERE Kode_Matakuliah='$nilai[Kode_Matakuliah_Nilai]'"));

							echo "
								<tr>
									<td>$nama[Nama_Mahasiswa]</a></td>
									<td>$matkul[Nama_Matakuliah]</td>
									<td>$nilai[Nilai]</td>
									<td><a href='#' onClick='confirm_delete(\"nilai_delete.php?Id_Nilai=$nilai[Id_Nilai]\")'>Delete</a></td>
								</tr>";
						}
					?>
				</tbody>