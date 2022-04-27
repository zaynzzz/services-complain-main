       <?php $i = 1;
        foreach ($sukses as $sukses) : ?>
           <tr>
               <td><?= $i++; ?></td>
               <td><?= $sukses['nama_pelanggan']; ?></td>
               <td><?= $sukses['keluhan']; ?></td>
               <td><?= $sukses['nama_teknisi']; ?></td>
               <td><?= $sukses['perbaikan']; ?></td>
               <td><?= $sukses['tgl_perbaikan']; ?></td>
               <td><?= $sukses['finished']; ?></td>
           </tr>
       <?php endforeach; ?>