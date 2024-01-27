 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Add Gas Station</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="POST" enctype="multipart/form-data">
                     <table class="table table-borderless mt-3">
                         <tr>
                             <td><b>Station Name:</b></td>
                             <td><input type="text" class="form-control" name="sname" placeholder="Enter Station Name" required /></td>
                         </tr>
                         <tr>
                             <td><b>City</b></td>
                             <td><input type="text" class="form-control" name="scity" placeholder="Enter Station City" required /></td>
                         </tr>
                         <tr>
                             <td><b>Contact</b></td>
                             <td><input type="text" class="form-control" name="sphone" placeholder="Enter Station Contact" required /></td>
                         </tr>

                         <tr>
                             <td><b>Picture</b></td>
                             <td><input type="file" name="pimage" class="form-control-file"></td>
                         </tr>
                         <tr>
                             <td><b>Select Manager</b></td>
                             <td>
                                 <select name="manager" class="form-control">
                                     <?php
                                        $result = mysqli_query($conn, "SELECT * FROM manager");
                                        while ($row = mysqli_fetch_array($result)) {  ?>
                                         <option value="<?php echo $row['managerId'] ?>"><?php echo $row['fullname'] ?></option>
                                     <?php } ?>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td><button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button></td>
                             <td><input type="submit" name="add_station" class="btn btn-success w-100" value="Add Gas Station"></td>
                         </tr>
                     </table>
                 </form>
             </div>

         </div>
     </div>
 </div>