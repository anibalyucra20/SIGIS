     </div> <!-- container-fluid -->
     </div>
     <!-- End Page-content -->

     <footer class="footer">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-6">
                     <div class="text-center text-lg-left">
                         2020 © Xeloro.
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="text-right d-none d-lg-block">
                         Design & Develop by Myra
                     </div>
                 </div>
             </div>
         </div>
     </footer>

     </div>
     <!-- end main content-->

     </div>
     <!-- END layout-wrapper -->


     <!-- jQuery  -->
     <script src="<?php echo BASE_URL ?>src/view/pp/assets/js/jquery.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/assets/js/bootstrap.bundle.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/assets/js/waves.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/assets/js/simplebar.min.js"></script>



     <!-- third party js -->
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/jquery.dataTables.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/dataTables.bootstrap4.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/dataTables.responsive.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/responsive.bootstrap4.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/dataTables.buttons.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/buttons.bootstrap4.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/buttons.html5.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/buttons.flash.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/buttons.print.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/dataTables.keyTable.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/dataTables.select.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/pdfmake.min.js"></script>
     <script src="<?php echo BASE_URL ?>src/view/pp/plugins/datatables/vfs_fonts.js"></script>
     <!-- third party js ends -->

     <!-- Datatables init -->
     <script src="<?php echo BASE_URL ?>src/view/pp/assets/pages/datatables-demo.js"></script>
     <!-- App js -->
     <script src="<?php echo BASE_URL ?>src/view/pp/assets/js/theme.js"></script>
     <script>
         $(document).ready(function() {
             $('#example').DataTable({
                 "language": {
                     "processing": "Procesando...",
                     "lengthMenu": "Mostrar _MENU_ registros",
                     "zeroRecords": "No se encontraron resultados",
                     "emptyTable": "Ningún dato disponible en esta tabla",
                     "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
                     "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                     "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                     "search": "Buscar:",
                     "infoThousands": ",",
                     "loadingRecords": "Cargando...",
                     "paginate": {
                         "first": "Primero",
                         "last": "Último",
                         "next": "Siguiente",
                         "previous": "Anterior"
                     },
                 }
             });

         });
     </script>
     </body>

     </html>